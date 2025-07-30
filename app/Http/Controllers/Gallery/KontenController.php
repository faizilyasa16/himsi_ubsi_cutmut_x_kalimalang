<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\KontenAlbum as KontenGallery;
class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua konten album
        $konten = KontenGallery::with('album')->get(); // Eager load
        return view('user.gallery.konten.index', compact('konten'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        return view('user.gallery.konten.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'album_id' => 'required|exists:album,id',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload foto ke storage/public/foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto', 'public'); // simpan ke storage/app/public/foto
            $validated['foto'] = $path; // hasil: foto/nama_file.jpg
        }

        // Simpan data ke database
        KontenGallery::create($validated);

        return redirect()->route('konten-gallery.index')->with('success', 'Konten berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $konten = KontenGallery::findOrFail($id);
        $albums = Album::all(); // Ambil semua album untuk dropdown
        return view('user.gallery.konten.edit', compact('konten', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'album_id' => 'required|exists:album,id', // pastikan id album valid
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
        ]);

        // Handle upload file jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto', 'public'); // simpan ke storage/app/public/foto
            $validated['foto'] = $path; // hasil: foto/nama_file.jpg
        }

        // Update data ke database
        $konten = KontenGallery::findOrFail($id);
        $konten->update($validated);

        // Redirect atau response
        return redirect()->route('konten-gallery.index')->with('success', 'Konten berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konten = KontenGallery::findOrFail($id);
        $konten->delete();
        return redirect()->route('konten-gallery.index')->with('success', 'Konten berhasil dihapus.');
    }
}
