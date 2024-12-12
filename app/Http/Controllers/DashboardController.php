<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = Guru::where('is_active', '=', 'T')->count();
        $teacherOff = Guru::where('is_active', '=', 'F')->count();
        $student = Student::where('is_active', '=', 'T')->count();
        $studentLaki = Student::where('is_active', '=', 'T')->where('jenis_kelamin', '=', 'P')->count();
        $studentPerempuan = Student::where('is_active', '=', 'T')->where('jenis_kelamin', '=', 'W')->count();
        $alumni = Student::where('is_active', '=', 'T')->where('is_lulus', '=', 'T')->count();
        return view('dashboard', compact('teacher', 'student', 'teacherOff', 'studentLaki', 'studentPerempuan', 'alumni'));
    }
}
