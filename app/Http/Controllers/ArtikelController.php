<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\SlugGenerator;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use SlugGenerator;
    public function index()
    {
        $user = Auth::user();

        if (in_array($user->role, ['admin', 'bph'])) {
            // Admin & BPH bisa lihat semua artikel
            $artikel = Artikel::all();
        } else {
            // Anggota hanya bisa lihat artikel yang dia buat
            $artikel = Artikel::where('user_id', $user->id)->get();
        }

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
        $user = Auth::user();

        // Validasi dasar
        $rules = [
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|in:pre-event,event,post-event,artikel',
            'deskripsi' => 'required|string',
            'konten'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Tambahkan validasi status kalau admin atau bph
        if (in_array($user->role, ['admin', 'bph'])) {
            $rules['status'] = 'required|in:draft,published,archived';
        }

        $validated = $request->validate($rules);

        // Buat slug
        $validated['slug'] = Str::slug($validated['judul']);
        $validated['user_id'] = $user->id;

        // Set status ke 'draft' jika anggota
        if ($user->role === 'anggota') {
            $validated['status'] = 'draft';
        }

        // Simpan file jika ada
        if ($request->hasFile('konten')) {
            $validated['konten'] = $request->file('konten')->store('artikel/foto', 'public');
        }

        // Simpan ke database
        Artikel::create($validated);

        Alert::success('Berhasil', 'Artikel berhasil disimpan.');
        return redirect()->route('artikel.index');
    }


    /**
     * Display the specified resource.
     */
    public function home()
    {
        $artikel = Artikel::where('status', 'published')->get();
        return view('home.layanan.artikel', compact('artikel'));
    }
    public function show(string $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('home.layanan.isi.artikel', compact('artikel'));
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

        // Validasi input
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|in:pre-event,event,post-event,artikel',
            'status'    => 'required|in:draft,published,archived',
            'deskripsi' => 'required|string',
            'konten'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika judul berubah, generate slug baru (tanpa tambahan -1, -2, dll)
        if ($validated['judul'] !== $artikel->judul) {
            $newSlug = Str::slug($validated['judul']);

            // Cek apakah slug sudah digunakan oleh artikel lain
            $slugExists = Artikel::where('slug', $newSlug)
                ->where('id', '!=', $artikel->id)
                ->exists();

            if ($slugExists) {
                return back()->withErrors(['judul' => 'Slug dari judul ini sudah digunakan. Silakan ubah judul.'])->withInput();
            }

            $validated['slug'] = $newSlug;
        } else {
            $validated['slug'] = $artikel->slug;
        }

        // Simpan file baru jika ada
        $filename = $artikel->konten;
        if ($request->hasFile('konten')) {
            if ($artikel->konten) {
                Storage::delete('public/' . $artikel->konten);
            }
            $filename = $request->file('konten')->store('artikel/foto', 'public');
        }

        // Update data
        $artikel->update([
            'judul'     => $validated['judul'],
            'slug'      => $validated['slug'],
            'kategori'  => $validated['kategori'],
            'status'    => $validated['status'],
            'deskripsi' => $validated['deskripsi'],
            'konten'    => $filename,
            'user_id'   => Auth::id(),
        ]);

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
