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
        $teacherOff = Teachers::where('is_active', '=', 'F')->count();
        $student = Student::where('is_active', '=', 'T')->count();
        $studentLaki = Student::where('is_active', '=', 'T')->where('jenis_kelamin', '=', 'P')->count();
        $studentPerempuan = Student::where('is_active', '=', 'T')->where('jenis_kelamin', '=', 'W')->count();
        $alumni = Student::where('is_active', '=', 'T')->where('is_lulus', '=', 'T')->count();
        return view('dashboard', compact('teacher', 'student', 'teacherOff', 'studentLaki', 'studentPerempuan', 'alumni'));
    }
}
