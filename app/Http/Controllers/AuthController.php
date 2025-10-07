<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3'
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        $username = trim($request->username);
        $password = trim($request->password);

        //  password mengandung huruf kapital
        if (!preg_match('/[A-Z]/', $password)) {
            return back()->with('error', 'Password harus mengandung minimal satu huruf kapital.');
        }

        return view('login-success', ['username' => $username]);
    }
}
