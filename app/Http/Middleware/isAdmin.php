<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirect kalau bukan admin (pilih salah satu):
        // return redirect()->route('dashboard')->with('error', 'Kamu tidak punya akses sebagai admin.');
        abort(403, 'Unauthorized access.');
    }
}