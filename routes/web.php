<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KesalahanController;
use App\Http\Controllers\KeterlambatanGurusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Models\KeterlambatanGurus;
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
// dashboard
Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// jabatan
Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('jabatan', [JabatanController::class, 'index'])->name('jabatan');
    Route::post('jabatan', [JabatanController::class, 'store'])->name('jabatan-add');
    Route::post('updatejabatan', [JabatanController::class, 'update'])->name('jabatan-update');
    Route::get('jabatan/json', [JabatanController::class, 'dataTable'])->name('listJabatan');
    Route::post('jabatanDelete', [JabatanController::class, 'destroy'])->name('deleteJabatan');
});
// teacher
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
// student
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
// keterlambatan
Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('keterlambatan', [KeterlambatanGurusController::class, 'index'])->name('keterlambatan');
    Route::get('keterlambatan/add', [KeterlambatanGurusController::class, 'create'])->name('keterlambatanAdd');
    Route::post('keterlambatan/add', [KeterlambatanGurusController::class, 'store'])->name('keterlambatanStore');
    Route::get('keterlambatan/json', [KeterlambatanGurusController::class, 'dataTable'])->name('list.keterlambatan');
    Route::get('keterlambatan/{id}', [KeterlambatanGurusController::class, 'edit'])->name('keterlambatanEdit');
    Route::post('keterlambatan/{id}', [KeterlambatanGurusController::class, 'update'])->name('keterlambatanUpdate');
    Route::delete('keterlambatan/delete/{id}', [KeterlambatanGurusController::class, 'destroy'])->name('keterlambatanDelete');
    Route::get('keterlambatan/teachers/{name}', [KeterlambatanGurusController::class, 'searchName'])->name('list.nameTeacher');
});
// kesalahan
Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('kesalahan', [KesalahanController::class, 'index'])->name('kesalahan');
    Route::post('kesalahan', [KesalahanController::class, 'store'])->name('kesalahan-add');
    Route::post('updatekesalahan', [KesalahanController::class, 'update'])->name('kesalahan-update');
    Route::get('kesalahan/json', [KesalahanController::class, 'dataTable'])->name('listkesalahan');
    Route::post('kesalahanDelete', [KesalahanController::class, 'destroy'])->name('deletekesalahan');
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
