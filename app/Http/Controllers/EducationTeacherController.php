<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EducationTeacherController extends Controller
{
    public function getTeacherId()
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first('id');
        return $teacher->id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::where('teacher_id', $this->getTeacherId())->get();

        return view('dashboard.education-teacher', [
            'education' => $education
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
        $teacher_id = $this->getTeacherId();

        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'string',
        ]);

        $validate['teacher_id'] = $teacher_id;

        Education::create($validate);

        return Redirect::route('education.index')->with('status', 'Success Add Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = Education::where('id', $id)->first();
        return view('dashboard.education-teacher-edit', [
            'education' => $education,
        ]);
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
        $validate = $request->validate([
            'name' => 'string',
            'description' => 'string'
        ]);

        Education::where('id', $id)->update($validate);
        return Redirect::route('education.index')->with('status', 'Success Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::where('id', $id)->delete();
        return Redirect::route('education.index')->with('status', 'Success Delete Data');
    }
}
