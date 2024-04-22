<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/profile', [UserController::class, 'test'])->middleware('auth')->name('profile')->middleware('auth');
Route::get('/test', [UserController::class, 'test'])->middleware('auth');
Route::get('/', [UserController::class, 'home']);