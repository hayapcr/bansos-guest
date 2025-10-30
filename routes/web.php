<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guest\DashboardController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Guest\WargaController;
use App\Http\Controllers\Guest\ProgramBantuanController;
use App\Http\Controllers\Guest\UserController;

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

Route::view('about', 'guest.about')->name('about');
    Route::view('layanan', 'guest.layanan')->name('layanan');
    Route::view('kontak', 'guest.kontak')->name('kontak');

    // menerima form kontak (POST) -- closure sederhana
     Route::post('kontak/kirim', function (Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // sementara hanya redirect dengan pesan sukses
        return redirect()->route('guest.kontak')->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    })->name('kontak.kirim');

// CRUD Warga & Program Bantuan
Route::resource('warga', WargaController::class);
Route::resource('program_bantuan', ProgramBantuanController::class);

// CRUD User
    Route::resource('user', UserController::class);
});
