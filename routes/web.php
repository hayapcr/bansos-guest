<?php

use App\Http\Controllers\AuthController;

// AUTH CONTROLLER
use App\Http\Controllers\Guest\PendaftarBantuanController;

// GUEST CONTROLLERS
use App\Http\Controllers\Guest\PenerimaBantuanController;
use App\Http\Controllers\Guest\ProgramBantuanController;
use App\Http\Controllers\Guest\RiwayatPenyaluranBantuanController;
use App\Http\Controllers\Guest\UserController;
use App\Http\Controllers\Guest\VerifikasiLapanganController;
use App\Http\Controllers\Guest\WargaController;
use App\Http\Controllers\Guest\ProfilController;
use App\Http\Controllers\Guest\WelcomeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/* ============================================================
|   HALAMAN UTAMA / WELCOME
============================================================ */
// Redirect otomatis ke profil jika sudah login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('guest.my_profile');
    }
    return redirect()->route('welcome');
})->name('home');

// Halaman welcome untuk guest
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');


/* ============================================================
|   HALAMAN LOGIN
============================================================ */
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/ah/login', [AuthController::class, 'login'])->name('auth.login');

/* ============================================================
|   PUBLIC / GUEST ROUTES (BISA DIAKSES TANPA LOGIN)
============================================================ */
Route::get('/dashboard', [App\Http\Controllers\Guest\DashboardController::class, 'index'])->name('dashboard');

Route::prefix('guest')->name('guest.')->group(function () {
    Route::view('about', 'guest.about')->name('about');
    Route::view('layanan', 'guest.layanan')->name('layanan');
    Route::view('kontak', 'guest.kontak')->name('kontak');

    Route::post('kontak/kirim', function (Request $request) {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);
        return redirect()->route('guest.kontak')->with('success', 'Pesan Anda berhasil dikirim.');
    })->name('kontak.kirim');
});

/* ============================================================
|   ADMIN — BISA AKSES SEMUA FITUR + HALAMAN PUBLIK
============================================================ */
Route::group(['middleware' => ['checkrole:admin']], function () {

    Route::prefix('guest')->name('guest.')->group(function () {

        Route::post('kontak/kirim', function (Request $request) {
            $request->validate([
                'name'    => 'required|string|max:255',
                'email'   => 'required|email',
                'message' => 'required|string',
            ]);
            return redirect()->route('guest.kontak')
                ->with('success', 'Pesan Anda berhasil dikirim.');
        })->name('kontak.kirim');

        Route::resource('program_bantuan', ProgramBantuanController::class);
        Route::get('program_bantuan/{id}/detail', [ProgramBantuanController::class, 'detail'])->name('program_bantuan.detail');
        Route::post('program_bantuan/{id}/upload-media', [ProgramBantuanController::class, 'uploadMedia'])->name('program_bantuan.uploadMedia');
        Route::delete('program_bantuan/{media_id}/media/delete', [ProgramBantuanController::class, 'deleteMedia'])->name('program_bantuan.media.delete');

        Route::resource('warga', WargaController::class);
        Route::resource('user', UserController::class);
        Route::resource('pendaftar_bantuan', PendaftarBantuanController::class);
        Route::delete(
            'pendaftar_bantuan/{media_id}/media/delete',
            [PendaftarBantuanController::class, 'deleteMedia']
        )->name('pendaftar_bantuan.media.delete');

        Route::resource('verifikasi_lapangan', VerifikasiLapanganController::class);
        Route::get('verifikasi_lapangan/{id}/detail', [VerifikasiLapanganController::class, 'detail'])->name('verifikasi_lapangan.detail');
        Route::delete(
            'verifikasi_lapangan/{media_id}/media/delete',
            [VerifikasiLapanganController::class, 'deleteMedia']
        )->name('verifikasi_lapangan.media.delete');

        Route::resource('penerima_bantuan', PenerimaBantuanController::class);

        Route::resource('riwayat_penyaluran', RiwayatPenyaluranBantuanController::class);
        Route::get('riwayat_penyaluran/{id}/detail', [RiwayatPenyaluranBantuanController::class, 'detail'])->name('riwayat_penyaluran.detail');
        Route::post('riwayat_penyaluran/{id}/upload-media', [RiwayatPenyaluranBantuanController::class, 'uploadMedia'])->name('riwayat_penyaluran.uploadMedia');
        Route::delete('riwayat_penyaluran/{media_id}/media/delete', [RiwayatPenyaluranBantuanController::class, 'deleteMedia'])->name('riwayat_penyaluran.media.delete');

    });

});

/* ============================================================
|   KEPALA DESA — HANYA AKSES DASHBOARD (sementara)
============================================================ */
Route::group(['middleware' => ['checkrole:kades']], function () {
    // Nanti jika ada halaman khusus kades
});

/* ============================================================
|   LOGOUT
============================================================ */
Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect()->route('auth.index')->with('success', 'Berhasil logout.');
})->name('logout');

/* ============================================================
|   HALAMAN PROFIL
============================================================ */
Route::get('/my-profile', function () {
    return view('guest.profil'); // pastikan file blade ini ada di resources/views/guest/profil.blade.php
})->name('guest.my_profile');
