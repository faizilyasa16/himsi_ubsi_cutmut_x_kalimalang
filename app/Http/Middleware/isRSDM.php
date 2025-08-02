<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class isRSDM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::check() &&
            (
                in_array(Auth::user()->role, ['admin', 'bph']) ||
                Auth::user()->divisi === 'rsdm'
            )
        ) {
            return $next($request);
        }

        abort(403, 'Unauthorized: RSDM only.');
        }
}
