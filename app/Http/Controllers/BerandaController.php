<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Album;
use App\Models\KesanPesan;
use App\Models\KontenAlbum;
use App\Models\JoinHimsi;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{

    public function index()
    {
        $join = JoinHimsi::first();
        $galeri = KontenAlbum::inRandomOrder()->take(3)->get();
        if (Auth::check()) {
            // Jika user login, tampilkan semua acara
            $acara = Acara::whereIn('status', ['open', 'closed'])->latest()->paginate(6);
        } else {
            // Jika belum login, hanya tampilkan acara dengan nama kategori yang tidak mengandung 'himsi'
            $acara = Acara::whereHas('kategori', function ($query) {
                $query->where('nama', 'NOT LIKE', '%himsi%');
            })->whereIn('status', ['open', 'closed'])->latest()->paginate(6);
        }
        $anggota = User::whereIn('role', ['anggota', 'bph', 'alumni'])->count();
        $users = User::whereIn('role', ['anggota', 'bph'])->count();

        // Ambil artikel yang statusnya published
        $artikels = Artikel::whereIn('status', ['published'])->latest()->take(4)->get();
        $kesanPesan = KesanPesan::inRandomOrder()->whereIn('status', ['active'])->take(6)->get();
        return view('home.beranda.home', compact('acara', 'anggota', 'users', 'artikels', 'galeri', 'kesanPesan', 'join'));
    }

}
