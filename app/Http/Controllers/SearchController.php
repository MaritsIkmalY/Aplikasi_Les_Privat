<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function filter(Request $request)
    {
        $daerah = $request->daerah;
        $teacher = Teacher::whereHas('user', function ($query) use ($daerah) {
            $query->where('address', $daerah);
        })->get();

        return view('dashboard.index', [
            'teachers' => $teacher,
        ]);
    }
}
