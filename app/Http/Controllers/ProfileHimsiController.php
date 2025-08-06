<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\StrukturOrganisasi;
use App\Models\User;
class ProfileHimsiController extends Controller
{
    public function index()
    {
        $acara = Acara::whereIn('status', ['open', 'closed'])->get();
        return view('home.profile.program', compact('acara'));
    }
    public function struktur()
    {
        // Ambil data struktur organisasi dari model
        $struktur = StrukturOrganisasi::latest()->first(); // ambil data terbaru berdasarkan created_at
        return view('home.profile.struktur' , compact('struktur'));
    }
    public function pengurus()
    {
        $pengurus = User::whereIn('role', ['bph', 'anggota'])
            ->orderByRaw("FIELD(role, 'bph', 'anggota')")
            ->orderByRaw("FIELD(divisi, 'ketua', 'wakil_ketua', 'sekretaris', 'bendahara', 'pendidikan', 'rsdm', 'litbang', 'kominfo')")
            ->get();

        return view('home.profile.pengurus', compact('pengurus'));
    }

}
