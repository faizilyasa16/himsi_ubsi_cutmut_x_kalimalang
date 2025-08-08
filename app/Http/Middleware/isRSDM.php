<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsRsdm
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::check() &&
            (
                Auth::user()->role === 'admin' ||
                (Auth::user()->role === 'bph' && Auth::user()->divisi === 'rsdm')
            )
        ) {
            return $next($request);
        }

        abort(403, 'Unauthorized: hanya admin atau bph dari divisi RSDM yang bisa mengakses.');
    }

}
