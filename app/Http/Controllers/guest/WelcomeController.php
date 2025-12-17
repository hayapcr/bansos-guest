<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('guest.welcome'); // halaman welcome untuk semua orang
    }
}
