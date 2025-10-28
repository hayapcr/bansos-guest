<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        // 🔹 Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        // 🔹 Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // 🔹 Jika email tidak ditemukan
        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        // 🔹 Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah.');
        }

        // 🔹 Jika benar, tampilkan halaman sukses dulu
        return view('login-success', ['email' => $user->email]);
    }
}
