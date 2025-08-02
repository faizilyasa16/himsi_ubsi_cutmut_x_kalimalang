<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
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

        // Gabungkan validasi NIM dan password dengan pesan error yang sama
        if (!$user || !Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            return back()->withErrors([
                'login_error' => 'NIM atau password salah.'
            ])->withInput();
        }

        $request->session()->regenerate();
        Alert::toast('Selamat datang, ' . Auth::user()->name . '!', 'success');
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
