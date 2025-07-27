<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class IsLoggedIn
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Jika belum login, tolak akses (bisa redirect atau abort)
            return redirect()->route('login')->withErrors(['Anda harus login terlebih dahulu.']);
        }

        // Jika sudah login, lanjutkan ke halaman selanjutnya
        return $next($request);
    }
}
