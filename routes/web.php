<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/profil', [UserController::class, 'profil'])->middleware('auth')->name('profile')->middleware('auth');
Route::get('/test', [UserController::class, 'test'])->middleware('auth');
Route::get('/', [UserController::class, 'home']);

Route::get('/home', [KaryawanController::class, 'home'])->middleware('auth');
Route::get('/jadwal', [KaryawanController::class, 'jadwal'])->middleware('auth');
Route::get('/izin', [KaryawanController::class, 'izin'])->middleware('auth');
Route::get('/gaji', [KaryawanController::class, 'gaji'])->middleware('auth');

// Route::get('/home', [AdminController::class, 'home'])->middleware('auth');
Route::get('/kelola_karyawan', [AdminController::class, 'kelola_karyawan'])->middleware('auth');
Route::get('/tambah_karyawan', [AdminController::class, 'tambah_karyawan'])->middleware('auth');
Route::get('/edit_karyawan', [AdminController::class, 'edit_karyawan'])->middleware('auth');
Route::get('/validasi_izin', [AdminController::class, 'validasi_izin'])->middleware('auth');
Route::get('/absensi', [AdminController::class, 'absensi'])->middleware('auth');
Route::get('/menu_jadwal', [AdminController::class, 'menu_jadwal'])->middleware('auth');
Route::get('/kelola_jadwal', [AdminController::class, 'kelola_jadwal'])->middleware('auth');
Route::get('/menu_gaji', [AdminController::class, 'menu_gaji'])->middleware('auth');
Route::get('/gaji_lembur', [AdminController::class, 'gaji_lembur'])->middleware('auth');