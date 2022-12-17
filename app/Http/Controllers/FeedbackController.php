<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback(Request $request, $id)
    {
        $validate = $request->validate([]);
    }
}
