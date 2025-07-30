<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kategori gallery
        $album = Album::all();
        return view('user.gallery.album.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat album baru
        return view('user.gallery.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        // Buat slug dari nama
        $validated['slug'] = Str::slug($validated['nama']);

        // Simpan ke database
        Album::create($validated);

        // Redirect atau respon
        return redirect()->route('album-gallery.index')->with('success', 'Album berhasil ditambahkan.');
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
    public function edit(string $slug)
    {
        $album = Album::where('slug', $slug)->firstOrFail();

        return view('user.gallery.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        // Ambil album berdasarkan slug
        $album = Album::where('slug', $slug)->firstOrFail();

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        // Update slug jika nama berubah
        $validated['slug'] = Str::slug($validated['nama']);

        // Update data
        $album->update($validated);

        return redirect()->route('album-gallery.index')->with('success', 'Album berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('album-gallery.index')->with('success', 'Album berhasil dihapus.');
    }
}
