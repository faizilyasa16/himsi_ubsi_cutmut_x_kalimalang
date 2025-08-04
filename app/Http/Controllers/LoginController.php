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

    $user = User::where('nim', $request->nim)->first();

    if (!$user || !Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
        return back()->withErrors([
            'login_error' => 'NIM atau password salah.'
        ])->withInput();
    }

    $request->session()->regenerate();

    Alert::toast('Selamat datang, ' . Auth::user()->name . '!', 'success');

    // Arahkan sesuai role
    $role = Auth::user()->role;

    if (in_array($role, ['bph', 'anggota', 'alumni'])) {
        return redirect()->route('profile');
    }

    return redirect()->route('dashboard');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
