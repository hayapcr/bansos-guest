<?php
namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the guest dashboard.
     */
    public function index()
    {
        // guest (pengunjung) — tampilkan dashboard publik ringan
        return view('guest.dashboard');
    }


/**
 * Show the form for creating a new resource.
 */
public function create()
{
    // jika tidak digunakan, boleh dibiarkan kosong atau dihapus
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // implementasi store jika perlu
}

/**
 * Display the specified resource.
 */
public function show(string $id)
{
    // implementasi show jika perlu
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    // implementasi edit jika perlu
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // implementasi update jika perlu
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    // implementasi destroy jika perlu
}
};
