<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Order;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();

        $validated = $request->validate([
            'message' => 'required', 
            'rate' => 'required'
        ]);
        
        $validated['teacher_id'] = $order->teacher->id;
        $validated['student_id'] = $order->student->id;

        Feedback::create($validated);

        Order::where('id', $id)->update([
            'status_study' => true
        ]);

        return back()->with('status', 'Feedback berhasil terkirim.');

    }
}
