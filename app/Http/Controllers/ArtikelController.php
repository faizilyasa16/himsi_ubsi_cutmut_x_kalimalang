<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua artikel
        $artikel = Artikel::all();
        // Konfirmasi hapus dengan SweetAlert
        $title = 'Konfirmasi Hapus Artikel';
        $text = "Apakah Anda yakin ingin menghapus artikel ini? Semua data terkait akan hilang.";
        confirmDelete($title, $text);
        return view('user.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'slug'      => 'required|string|unique:artikels,slug',
            'kategori'  => 'required|in:pre-event,event,post-event,artikel',
            'status'    => 'required|in:draft,published,archived',
            'deskripsi' => 'required|string',
            'konten'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file gambar jika ada
        $filename = null;
        if ($request->hasFile('konten')) {
            $filename = $request->file('konten')->store('artikel/foto', 'public');
        }

        // Simpan data ke database
        Artikel::create([
            'user_id'   => Auth::user()->id, // pastikan user login
            'judul'     => $validated['judul'],
            'slug'      => $validated['slug'],
            'kategori'  => $validated['kategori'],
            'status'    => $validated['status'],
            'deskripsi' => $validated['deskripsi'],
            'konten'    => $filename,
        ]);
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Artikel berhasil disimpan.');
        return redirect()->route('artikel.index');
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
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('user.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'slug'      => 'required|string|unique:artikels,slug,' . $artikel->id,
            'kategori'  => 'required|in:pre-event,event,post-event,artikel',
            'status'    => 'required|in:draft,published,archived',
            'deskripsi' => 'required|string',
            'konten'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file baru dikirim
        if ($request->hasFile('konten')) {
            // Hapus konten lama jika ada
            if ($artikel->konten && Storage::exists('public/' . $artikel->konten)) {
                Storage::delete('public/' . $artikel->konten);
            }

            // Simpan konten baru
            $path = $request->file('konten')->store('artikel', 'public');
            $validated['konten'] = $path;
        }

        $validated['user_id'] = Auth::user()->id; // pastikan user login

        $artikel->update($validated);
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Artikel berhasil diperbarui.');
        return redirect()->route('artikel.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus konten jika ada
        if ($artikel->konten && Storage::exists('public/' . $artikel->konten)) {
            Storage::delete('public/' . $artikel->konten);
        }

        $artikel->delete();
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Artikel berhasil dihapus.');
        return redirect()->route('artikel.index');
    }
}
