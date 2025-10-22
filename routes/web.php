<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guest\DashboardController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Guest\WargaController;
use App\Http\Controllers\Guest\ProgramBantuanController;


// Halaman utama default Laravel
Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// Dashboard BinaDesa
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Program Controller (kalau masih dipakai)
Route::prefix('guest')->name('guest.')->group(function () {
    Route::get('programs', [ProgramController::class, 'index'])->name('programs.index');

// CRUD Warga & Program Bantuan
Route::resource('warga', WargaController::class);
Route::resource('program_bantuan', ProgramBantuanController::class);
});
