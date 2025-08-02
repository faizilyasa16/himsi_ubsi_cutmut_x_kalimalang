<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kategori gallery
        $album = Album::all();
        // Konfirmasi hapus dengan SweetAlert
        $title = 'Konfirmasi Hapus Album';
        $text = "Apakah Anda yakin ingin menghapus album ini? Semua foto terkait akan hilang.";
        confirmDelete($title, $text);
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
        $baseSlug = Str::slug($validated['nama']);
        
        // Cek apakah slug sudah ada, jika ada tambahkan nomor di belakangnya
        $count = 1;
        $slug = $baseSlug;
        while (Album::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }
        
        $validated['slug'] = $slug;

        // Simpan ke database
        Album::create($validated);
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Album berhasil ditambahkan.');
        // Redirect atau respon
        return redirect()->route('album-gallery.index');
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
        if ($album->nama != $validated['nama']) {
            $baseSlug = Str::slug($validated['nama']);
            
            // Cek apakah slug sudah ada, jika ada tambahkan nomor di belakangnya
            $count = 1;
            $slug = $baseSlug;
            while (Album::where('slug', $slug)->where('id', '!=', $album->id)->exists()) {
                $slug = $baseSlug . '-' . $count++;
            }
            
            $validated['slug'] = $slug;
        }

        // Update data
        $album->update($validated);
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Album berhasil diperbarui.');
        return redirect()->route('album-gallery.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Album berhasil dihapus.');
        return redirect()->route('album-gallery.index');
    }
}
