<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KesalahanController;
use App\Http\Controllers\PrestasiDetailController;
use App\Http\Controllers\KesalahanDetailController;
use App\Http\Controllers\KeterlambatanGurusController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Teachers;

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
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth', 'verified')->group(function () {

    // role controller
    Route::resource('roles', RolesController::class);
    Route::get('/roles-app/json', [RolesController::class, 'dataTable'])->name('roles.list');


    // users
    Route::resource('user', UserController::class);
    Route::get('users/json', [UserController::class, 'dataTable'])->name('user.list');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // jabatan
    Route::get('jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::post('jabatan', [JabatanController::class, 'store'])->name('jabatan.create');
    Route::post('updatejabatan', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::get('jabatan/json', [JabatanController::class, 'dataTable'])->name('jabatan.list');
    Route::post('jabatanDelete', [JabatanController::class, 'destroy'])->name('jabatan.delete');
    Route::get('jabatan/import', [JabatanController::class, 'importFile'])->name('jabatan.import');
    Route::post('jabatan/import', [JabatanController::class, 'prosesImport'])->name('jabatanImportProses');

    // teacher
    Route::resource('guru', TeachersController::class);
    Route::get('gurus/json', [TeachersController::class, 'dataTable'])->name('guru.list');
    Route::get('gurus/import', [TeachersController::class, 'importFile'])->name('guru.import');
    Route::post('gurus/import', [TeachersController::class, 'prosesImport'])->name('guru.prosesImport');

    // student  
    Route::resource('siswa', StudentController::class);
    Route::get('siswas/json', [StudentController::class, 'dataTable'])->name('siswa.list');
    Route::get('student/json/{name}', [StudentController::class, 'searchName'])->name('list.studentName');
    Route::get('siswas/import', [StudentController::class, 'importFile'])->name('siswa.import');
    Route::post('siswas/import', [StudentController::class, 'prosesImport'])->name('siswa.import');
    Route::get('kenaikan', [StudentController::class, 'kenaikanKelas'])->name('kenaikanKelas');
    Route::post('kenaikan/list', [StudentController::class, 'getStudentKenaikan'])->name('studentListKenaikan');
    Route::post('kenaikan', [StudentController::class, 'prosesStudentKenaikan'])->name('studentProsesKenaikan');

    // keterlambatan guru
    Route::resource('keterlambatanguru', KeterlambatanGurusController::class);
    Route::get('keterlambatangurus/json', [KeterlambatanGurusController::class, 'dataTable'])->name('keterlambatanguru.list');
    Route::get('keterlambatangurus/json/{name}', [KeterlambatanGurusController::class, 'searchName'])->name('keterlambatanguruByName.list');

    // kesalahan
    Route::resource('kesalahan-siswa', KesalahanController::class);
    Route::get('kesalahan-siswas/json', [KesalahanController::class, 'dataTable'])->name('kesalahan-siswa.list');

    // kesalahan detail
    Route::resource('detailkesalahan-siswa', KesalahanDetailController::class);
    Route::get('detailkesalahan-siswas/json', [KesalahanDetailController::class, 'dataTable'])->name('detailkesalahan-siswa.list');
    Route::get('detailkesalahan-siswas/json/{name}', [KesalahanDetailController::class, 'searchName'])->name('detailkesalahan-siswaByName.list');

    // prestasi
    Route::resource('prestasi-siswa', PrestasiController::class);
    Route::get('prestasi-siswas/json', [PrestasiController::class, 'dataTable'])->name('prestasi-siswa.list');

    // prestasi detail
    Route::resource('detailprestasi-siswa', PrestasiDetailController::class);
    Route::get('detailprestasi-siswas/json', [PrestasiDetailController::class, 'dataTable'])->name('detailprestasi-siswa.list');
    Route::get('detailprestasi-siswas/json/{name}', [PrestasiDetailController::class, 'searchName'])->name('detailprestasi-siswaByName.list');
});



require __DIR__ . '/auth.php';
