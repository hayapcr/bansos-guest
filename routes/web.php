<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\ProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('guest')->name('guest.')->group(function () {
    Route::get('programs', [ProgramController::class, 'index'])->name('programs.index');
});
