<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileStudentController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $validated = $request->validate([
            'grade' => 'numeric|max:5'
        ]);

        Student::where('user_id', $user_id)->update([
            'grade_id' => $validated['grade']
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

}
