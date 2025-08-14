<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }

        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Honeypot protection
        if ($request->filled('website')) {
            return back()->withErrors([
                'login_error' => 'NIM atau password salah.'
            ])->withInput();
        }

        $request->validate([
            'nim' => 'required|numeric|max_digits:20',
            'password' => 'required|string|max:50'
        ]);

        // Rate limiting per IP - 3x salah = block 1 menit
        $ipKey = 'login_ip:' . $request->ip();
        if (RateLimiter::tooManyAttempts($ipKey, 3)) { // 3 attempts per 1 minute
            $seconds = RateLimiter::availableIn($ipKey);
            return back()->withErrors([
                'throttle' => "Terlalu banyak percobaan login dari IP ini. Coba lagi dalam {$seconds} detik."
            ]);
        }

        // Rate limiting per NIM - 3x salah = block 1 menit
        $nimKey = 'login_nim:' . $request->nim;
        if (RateLimiter::tooManyAttempts($nimKey, 3)) { // 3 attempts per 1 minute per NIM
            $seconds = RateLimiter::availableIn($nimKey);
            return back()->withErrors([
                'throttle' => "NIM ini telah mencoba login terlalu banyak. Coba lagi dalam {$seconds} detik."
            ]);
        }

        $user = User::where('nim', $request->nim)->first();

        if (!$user || !Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            // Hit rate limiters - 1 menit block
            RateLimiter::hit($ipKey, 60); // 1 minute
            RateLimiter::hit($nimKey, 60); // 1 minute
            
            // Log failed attempt
            Log::warning('Failed login attempt', [
                'nim' => $request->nim,
                'ip' => $request->ip(),
            ]);

            sleep(3); // Delay lebih lama untuk memperlambat brute force

            return back()->withErrors([
                'login_error' => 'NIM atau password salah.'
            ])->withInput(['nim' => $request->nim]);
        }

        // Clear rate limiting on success
        RateLimiter::clear($ipKey);
        RateLimiter::clear($nimKey);

        $request->session()->regenerate();

        Alert::toast('Selamat datang, ' . Auth::user()->name . '!', 'success');

        // Redirect sesuai role
        if (in_array(Auth::user()->role, ['bph', 'anggota', 'alumni'])) {
            return redirect()->route('profile');
        }

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        
        // Log logout
        Log::info('User logout', [
            'user_id' => $user->id,
            'nim' => $user->nim,
            'ip' => $request->ip(),
            'timestamp' => now()
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
