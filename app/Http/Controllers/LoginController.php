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

        // Rate limiting per IP - lebih ketat untuk mencegah brute force dengan NIM berbeda
        $ipKey = 'login_ip:' . $request->ip();
        if (RateLimiter::tooManyAttempts($ipKey, 3)) { // Hanya 3 attempts per 10 minutes
            $minutes = ceil(RateLimiter::availableIn($ipKey) / 60);
            return back()->withErrors([
                'throttle' => "Terlalu banyak percobaan login dari IP ini. Coba lagi dalam {$minutes} menit."
            ]);
        }

        // Rate limiting per NIM - tetap ada untuk melindungi akun spesifik
        $nimKey = 'login_nim:' . $request->nim;
        if (RateLimiter::tooManyAttempts($nimKey, 2)) { // 2 attempts per 30 minutes per NIM
            $minutes = ceil(RateLimiter::availableIn($nimKey) / 60);
            return back()->withErrors([
                'throttle' => "NIM ini telah mencoba login terlalu banyak. Coba lagi dalam {$minutes} menit."
            ]);
        }

        $user = User::where('nim', $request->nim)->first();

        if (!$user || !Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            // Hit rate limiters dengan waktu yang lebih lama
            RateLimiter::hit($ipKey, 600); // 10 minutes
            RateLimiter::hit($nimKey, 1800); // 30 minutes
            
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

        return redirect('/login');
    }
}
