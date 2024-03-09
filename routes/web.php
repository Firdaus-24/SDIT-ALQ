<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
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
    Route::get('jabatan/json', [JabatanController::class, 'dataTable'])->name('listJabatan');
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
