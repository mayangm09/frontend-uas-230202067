<?php

use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('homepage'); //supaya bisa balik ke halaman homepage selamat datang klo di klik
Route::resource(name: 'prodi', controller: ProdiController::class);
Route::get('/prodi/cetak', [prodiController::class, 'cetak'])->name('prodi.cetak');
Route::resource(name: 'mahasiswa', controller: MahasiswaController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');