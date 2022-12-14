<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Location;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            return view('dashboard.index', [
                'teachers' => Teacher::filter(request(['daerah', 'category']))->where('status', true)->get(),
                'category' => Category::get(),
                'locations' => Location::all(),
            ]);
        } else if (Auth::user()->role_id == 2) {
            return view('dashboard.index', [
                'order' => Order::where('teacher_id', Auth::user()->teacher->id)->latest()->take(3)->get(),
            ]);
        }
    }
    public function show($id)
    {
        $teacher = Teacher::where('id', $id)->first();
        $student = Student::where('user_id', Auth::user()->id)->first();
        $feedback = Feedback::where('teacher_id', $id)->paginate(5);
        $order = Order::where('student_id', $student->id)
            ->where('teacher_id', $teacher->id)
            ->where('status_study', false)
            ->first();

        return view('dashboard.detail-teacher', [
            't' => $teacher,
            'order' => $order,
            'feedback' => $feedback,
        ]);
    }
}
