<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogin
{
   public function handle($request, Closure $next)
{
    if (! auth()->check()) {
        return redirect()->route('auth.index'); // jangan abort(403) untuk publik
    }
    return $next($request);
}
}
