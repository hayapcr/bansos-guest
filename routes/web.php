<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('guest')->name('guest.')->group(function () {
    Route::get('programs', [ProgramController::class, 'index'])->name('programs.index');
});

use App\Http\Controllers\AuthController;

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); 


