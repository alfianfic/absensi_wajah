<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AdminController;

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/',  [AuthController::class, 'index'])->name('login')->middleware('guest');

Route::get('/jadwal', [UserController::class, 'jadwal'])->middleware('auth')->name('profile')->middleware('auth');
Route::get('/profil', [UserController::class, 'profil'])->middleware('auth')->name('profile')->middleware('auth');
Route::get('/test', [UserController::class, 'test'])->middleware('auth');

Route::get('/beranda', [PegawaiController::class, 'beranda'])->middleware('pegawai');
Route::get('/izin', [PegawaiController::class, 'izin'])->middleware('pegawai');
Route::get('/gaji', [PegawaiController::class, 'gaji'])->middleware('pegawai');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');
Route::get('/kelola_karyawan', [AdminController::class, 'kelola_karyawan'])->middleware('admin');
Route::get('/tambah_karyawan', [AdminController::class, 'tambah_karyawan'])->middleware('admin');
Route::get('/edit_karyawan', [AdminController::class, 'edit_karyawan'])->middleware('admin');
Route::get('/validasi_izin', [AdminController::class, 'validasi_izin'])->middleware('admin');
Route::get('/absensi', [AdminController::class, 'absensi'])->middleware('admin');
Route::get('/kelola_jadwal', [AdminController::class, 'kelola_jadwal'])->middleware('admin');
Route::get('/menu_gaji', [AdminController::class, 'menu_gaji'])->middleware('admin');