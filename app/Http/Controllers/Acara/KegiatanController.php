<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\Support\Str;
use App\Models\KategoriAcara;
use Illuminate\Support\Facades\Storage;
class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua acara dengan relasi kategori
        $acara = Acara::with('kategori')->get();
        return view('user.acara.kegiatan.index', compact('acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua kategori acara untuk dropdown
        $kategoriAcara = KategoriAcara::all();
        return view('user.acara.kegiatan.create', compact('kategoriAcara'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id'       => 'nullable|exists:kategori_acara,id',
            'nama'              => 'required|string|max:200',
            'slug'              => 'nullable|string|max:200',
            'deskripsi'         => 'nullable|string|max:200',
            'lokasi'            => 'nullable|string|max:100',
            'contact_person'    => 'nullable|string|max:100',
            'poster'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kuota'             => 'nullable|string|max:10',
            'status'            => 'required|in:draft,published,archived',
            'tgl_mulai'         => 'required|date',
            'tgl_selesai'       => 'nullable|date|after_or_equal:tgl_mulai',
            'waktu_mulai'       => 'required',
            'waktu_selesai'     => 'nullable',
            'link_pendaftaran'  => 'nullable|string|max:200',
            'link_wa'           => 'nullable|string|max:200',
            'biaya'             => 'nullable|string|max:100',
            'payment_method'    => 'nullable|string|max:100',
            'payment_number'    => 'nullable|string|max:100',
            'payment_name'      => 'nullable|string|max:100',
        ]);
        // Gabung waktu dengan tanggal
        $validated['waktu_mulai'] = $request->tgl_mulai . ' ' . $request->waktu_mulai . ':00';

        if ($request->tgl_selesai && $request->waktu_selesai) {
            $validated['waktu_selesai'] = $request->tgl_selesai . ' ' . $request->waktu_selesai . ':00';
        }
        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($request->nama) . '-' . time();
        }

        // Upload poster jika ada
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $validated['poster'] = $posterPath;
        }

        // Simpan data ke database
        Acara::create($validated);

        return redirect()->route('kegiatan-acara.index')
            ->with('success', 'Acara berhasil ditambahkan.');
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
    public function edit(Acara $kegiatanAcara)
    {
        $kategoriAcara = KategoriAcara::all(); // ambil semua kategori supaya bisa dipilih di form

        return view('user.acara.kegiatan.edit', compact('kegiatanAcara', 'kategoriAcara'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acara $kegiatanAcara)
    {
        
        $validated = $request->validate([
            'kategori_id'       => 'nullable|exists:kategori_acara,id',
            'nama'              => 'required|string|max:200',
            'slug'              => 'nullable|string|max:200',
            'deskripsi'         => 'nullable|string|max:200',
            'lokasi'            => 'nullable|string|max:100',
            'contact_person'    => 'nullable|string|max:100',
            'poster'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kuota'             => 'nullable|string|max:10',
            'status'            => 'required|in:draft,published,archived',
            'tgl_mulai'         => 'required|date',
            'tgl_selesai'       => 'nullable|date|after_or_equal:tgl_mulai',
            'waktu_mulai'       => 'required',
            'waktu_selesai'     => 'nullable',
            'link_pendaftaran'  => 'nullable|string|max:200',
            'link_wa'           => 'nullable|string|max:200',
            'biaya'             => 'nullable|string|max:100',
            'payment_method'    => 'nullable|string|max:100',
            'payment_number'    => 'nullable|string|max:100',
            'payment_name'      => 'nullable|string|max:100',
        ]);

        // Upload poster jika ada
        if ($request->hasFile('poster')) {
            // Hapus poster lama jika ada
            if ($kegiatanAcara->poster) {
                Storage::disk('public')->delete($kegiatanAcara->poster);
            }
            
            $posterPath = $request->file('poster')->store('posters', 'public');
            $validated['poster'] = $posterPath;
        }

        // Update data
        $kegiatanAcara->update($validated);

        return redirect()->route('kegiatan-acara.index')
            ->with('success', 'Acara berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus acara berdasarkan ID
        $kegiatanAcara = Acara::findOrFail($id);

        // Hapus poster jika ada
        if ($kegiatanAcara->poster) {
            Storage::disk('public')->delete($kegiatanAcara->poster);
        }

        $kegiatanAcara->delete();

        return redirect()->route('kegiatan-acara.index')
            ->with('success', 'Acara berhasil dihapus.');
    }
}
