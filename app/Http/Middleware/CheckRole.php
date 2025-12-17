<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$allowedRoles): Response
    {
        // Jika user belum login → guest
        if (!Auth::check()) {
            if (in_array('guest', $allowedRoles)) {
                return $next($request);
            }
            return redirect()->route('auth.index')->with('error', 'Silakan login.');
        }

        // Jika user sudah login → cek role
        $userRole = Auth::user()->role;

        if (!in_array($userRole, $allowedRoles)) {
            return abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
