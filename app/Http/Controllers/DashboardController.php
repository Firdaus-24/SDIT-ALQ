<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = Guru::where('is_active', 1)->count();
        $teacherOff = Guru::where('is_active', 0)->count();
        $student = Siswa::where('is_active', 1)->count();
        $studentLaki = Siswa::where('is_active', 1)->where('jenis_kelamin', '=', 'P')->count();
        $studentPerempuan = Siswa::where('is_active', 1)->where('jenis_kelamin', '=', 'L')->count();
        $alumni = Siswa::where('is_lulus', 1)->count();
        return view('dashboard', compact('teacher', 'student', 'teacherOff', 'studentLaki', 'studentPerempuan', 'alumni'));
    }
}
