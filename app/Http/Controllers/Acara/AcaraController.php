<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\Support\Facades\Auth;
class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek apakah user login
        if (Auth::check()) {
            // Kalau login, tampilkan semua acara
            $acara = Acara::latest()->paginate(6);
        } else {
            // Kalau belum login, tampilkan acara yang kategorinya tidak mengandung kata "himsi"
            $acara = Acara::where('kategori', 'NOT LIKE', '%himsi%')
                        ->latest()
                        ->paginate(6);
        }

        return view('home.layanan.acara', compact('acara'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
        return view('home.layanan.isi.acara', compact('acara'));
    }

}
