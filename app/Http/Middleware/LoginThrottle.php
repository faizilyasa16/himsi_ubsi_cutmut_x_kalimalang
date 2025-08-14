<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LoginThrottle
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Hanya berlaku untuk POST request ke login
        if ($request->isMethod('POST') && $request->routeIs('login.store')) {
            
            // Global rate limit per IP yang sangat ketat untuk mencegah DDoS
            $globalKey = 'global_login:' . $request->ip();
            if (RateLimiter::tooManyAttempts($globalKey, 20, 60)) { // 20 attempts per hour
                Log::warning('Global login rate limit exceeded', [
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'timestamp' => now()
                ]);
                
                return response()->json([
                    'message' => 'Too many requests from this IP address.'
                ], 429);
            }
            
            RateLimiter::hit($globalKey, 3600); // 1 hour window
        }

        return $next($request);
    }
}
