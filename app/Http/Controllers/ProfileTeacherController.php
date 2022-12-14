<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileTeacherController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $validateData = $request->validate([
            'category_id' => 'required',
            'fee' => 'required',
            'schedule' => 'required',
        ]);

        Teacher::where('user_id', $user_id)->update($validateData);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function activateStatus(Request $request) {
        $user_id = Auth::user()->id;
        if($request->status == 'true') {
            Teacher::where('user_id', $user_id)->update([
                'status' => true
            ]);
        }
        else if($request->status == 'false') {
            Teacher::where('user_id', $user_id)->update([
                'status' => false
            ]);
        }

        return Redirect::route('dashboard')->with('status', 'Success updated status.');

    }
}
