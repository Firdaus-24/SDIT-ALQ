<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teachers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = Teachers::where('is_active', '=', 'T')->count();
        $student = Student::where('is_active', '=', 'T')->count();
        return view('dashboard', compact('teacher', 'student'));
    }
}
