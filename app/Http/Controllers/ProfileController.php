<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Teacher;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        if (Auth::user()->role_id == 1) {
            $grade = Grade::all();
            $student = Student::where('user_id', Auth::user()->id)->first();
            return view('profile.edit', [
                'user' => $request->user(),
                'grade' => $grade,
                'student' => $student,
            ]);
        }

        if (Auth::user()->role_id == 2) {
            $category = Category::all();
            $user_id = Auth::user()->id;
            $teacher = Teacher::where('user_id', $user_id)->first();
            // dd($teacher);
            return view('profile.edit', [
                'user' => $request->user(),
                'categories' => $category,
                'teacher' => $teacher,
            ]);
        }
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        $filename = $request->file('profile_photo_path')->getClientOriginalName().Auth::user()->id;

        $request->user()->profile_photo_path = $request->file('profile_photo_path')->storeAs('profile-photos', $filename, 'public');

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
