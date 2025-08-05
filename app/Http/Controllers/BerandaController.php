<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\User;
use App\Models\Artikel;
class BerandaController extends Controller
{

    public function index()
    {
        $acara = Acara::latest()->take(3)->get();
        $anggota = User::whereIn('role', ['anggota', 'bph', 'alumni'])->count();
        $users = User::whereIn('role', ['anggota', 'bph'])->count();

        // Ambil artikel yang statusnya open
        $artikels = Artikel::whereIn('status', ['open','closed'])->latest()->take(4)->get();

        return view('home.beranda.home', compact('acara', 'anggota', 'users', 'artikels'));
    }

}
