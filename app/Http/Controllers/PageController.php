<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function dashboard()
    {
        $students = Student::all();

        if (!auth()->check()) {
            return redirect()->route('login');
        }
        return view('dashboard', compact('students'));
    }

    public function showCounterPage()
    {
        return view('counter');
    }
}
