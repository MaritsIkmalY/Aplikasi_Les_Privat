<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            return view('dashboard.index', [
                'teachers' => Teacher::filter(request(['daerah', 'category']))->get(),
                'category' => Category::get(),
            ]);
        }
        else if(Auth::user()->role_id == 2) {
            return view('dashboard.index');
        }

    }
    public function show($id) {
        return view('dashboard.detail-teacher');
    }
}
