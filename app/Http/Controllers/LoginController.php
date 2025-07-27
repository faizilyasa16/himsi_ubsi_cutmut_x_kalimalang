<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric',
            'password' => 'required'
        ]);

        // Cek apakah user dengan NIM ada
        $user = User::where('nim', $request->nim)->first();

        if (!$user) {
            return back()->withErrors([
                'nim' => 'NIM tidak terdaftar.'
            ])->withInput();
        }

        // Coba login pakai Auth::attempt (pastikan config auth-nya pakai 'nim' juga)
        if (!Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            return back()->withErrors([
                'password' => 'Password salah.'
            ])->withInput();
        }

        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
