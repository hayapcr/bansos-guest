<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('guest.auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        // Coba login
        $loginSuccess = Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password
        ]);

        if (!$loginSuccess) {
            return back()->with('error', 'Email atau password salah!');
        }

        // Login berhasil
        $request->session()->regenerate(); // session baru aman
        // Simpan waktu login di session
        $request->session()->put('login_time', now()->format('d M Y H:i:s'));

        return redirect()->route('dashboard')
                         ->with('success', 'Berhasil login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.index')
                         ->with('success', 'Berhasil logout!');
    }
}
