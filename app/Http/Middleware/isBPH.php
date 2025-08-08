<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsBPH
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && in_array(Auth::user()->role, ['bph', 'admin'])) {
            return $next($request);
        }

        abort(403, 'Unauthorized: hanya BPH atau Admin yang bisa mengakses.');
    }
}