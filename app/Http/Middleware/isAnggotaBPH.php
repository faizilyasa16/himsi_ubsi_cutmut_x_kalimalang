<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAnggotaBPH
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && in_array(Auth::user()->role, ['anggota', 'bph'])) {
            return $next($request);
        }

        abort(403, 'Unauthorized: hanya untuk Anggota atau BPH.');
    }
}