<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 2) {
            $order = Order::filter(request(['status']))->where('teacher_id', Auth::user()->teacher->id)
                ->latest()->get();
        }

        if (Auth::user()->role_id == 1) {
            $order = Order::filter(request(['status']))->where('student_id', Auth::user()->student->id)
                ->latest()->get();
        }

        return view('dashboard.order', [
            'order' => $order
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $student_id = Student::where('user_id', Auth::user()->id)->first();
        Order::create([
            'teacher_id' => $request->teacher_id,
            'student_id' => $student_id->id,
        ]);
        return back()->with('status', 'Pemesanan dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.detail-order', [
            'order' => Order::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->status_order ? $massage = "Pesanan diterima" : $massage = "Pesanan ditolak";
        $validate = $request->validate([
            'status_order' => 'required',
            'massage' => 'string',
        ]);
        if ($request->status_order == false)
            $validate['status_study'] = true;

        Order::where('id', $id)->update($validate);
        return redirect(route('order.index'))->with('status', $massage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
