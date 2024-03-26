<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Models\Teachers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('jabatan', [JabatanController::class, 'index'])->name('jabatan');
    Route::post('jabatan', [JabatanController::class, 'store'])->name('jabatan-add');
    Route::post('updatejabatan', [JabatanController::class, 'update'])->name('jabatan-update');
    Route::get('jabatan/json', [JabatanController::class, 'dataTable'])->name('listJabatan');
    Route::post('jabatanDelete', [JabatanController::class, 'destroy'])->name('deleteJabatan');
});
Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('teachers', [TeachersController::class, 'index'])->name('teachers');
    Route::get('teachers/add', [TeachersController::class, 'create'])->name('teachersAdd');
    Route::post('teachers/add', [TeachersController::class, 'store'])->name('teachersStore');
    Route::get('teachers/{id}', [TeachersController::class, 'edit'])->name('teacherEdit');
    Route::post('teachers/{id}', [TeachersController::class, 'update'])->name('teacherUpdate');
    Route::get('teacher/json', [TeachersController::class, 'dataTable'])->name('listTeachers');
    Route::get('teacher/detail/{id}', [TeachersController::class, 'show'])->name('detailTeacher');
    Route::post('teacherDelete', [TeachersController::class, 'destroy'])->name('deleteTeacher');
});

Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('student', [StudentController::class, 'index'])->name('student');
    Route::get('student/add', [StudentController::class, 'create'])->name('studentCreate');
    Route::post('student/add', [StudentController::class, 'store'])->name('studentStore');
    Route::get('student/detail/{id}', [StudentController::class, 'show'])->name('studentDetail');
    Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('studentEdit');
    Route::post('student/edit/{id}', [StudentController::class, 'update'])->name('studentUpdate');
    Route::post('studentDelete', [StudentController::class, 'destroy'])->name('studentDelete');
    Route::get('student/json', [StudentController::class, 'dataTable'])->name('list.student');
});

// Route::get('admin', function () {
//     return '<h1>hello admin</h1>';
// })->middleware(['auth', 'verified', 'role:admin|superadmin']);

// Route::get('superadmin', function () {
//     return '<h1>hello superadmin</h1>';
// })->middleware(['auth', 'verified', 'role:superadmin']);

// Route::get('testusers', function () {
//     return '<h1>hello users</h1>';
// })->middleware(['auth', 'verified', 'role:users']);

require __DIR__ . '/auth.php';
