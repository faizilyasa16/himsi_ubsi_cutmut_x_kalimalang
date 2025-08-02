<?php

namespace App\Http\Controllers\PemilihanUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilihan;
use App\Models\User;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kandidat
        $kandidat = Kandidat::all();
        // Konfirmasi hapus dengan SweetAlert
        $title = 'Konfirmasi Hapus Kandidat';
        $text = "Apakah Anda yakin ingin menghapus kandidat ini? Semua data terkait akan hilang.";
        confirmDelete($title, $text);
        return view('user.pemilihan-umum.kandidat.index', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data pemilihan untuk dropdown
        $pemilihans = Pemilihan::all();

        // Ambil hanya user dengan role bph atau anggota
        $pengurus = User::whereIn('role', ['bph', 'anggota'])->get();

        return view('user.pemilihan-umum.kandidat.create', compact('pemilihans', 'pengurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kandidat_ketua_id' => 'required|exists:users,id',
            'kandidat_wakil_id' => 'required|exists:users,id|different:kandidat_ketua_id',
            'pemilihan_id'      => 'required|exists:pemilihan,id',
            'no_urut'           => 'required|integer',
            'visi'              => 'required|string',
            'misi'              => 'required|string',
            'poster'            => 'nullable|image|max:2048', // Max 2MB
        ]);

        // Simpan poster ke storage/app/public/poster_kandidat
        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('poster_kandidat', 'public');
        }


        // Simpan data ke tabel kandidat
        Kandidat::create($validated);
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Kandidat berhasil ditambahkan.');
        return redirect()->route('kandidat.index');
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
        $kandidat = Kandidat::findOrFail($id);
        $pemilihans = Pemilihan::all();
        $pengurus = User::all();
        
        return view('user.pemilihan-umum.kandidat.edit', compact('kandidat', 'pemilihans', 'pengurus'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $kandidat = Kandidat::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'kandidat_ketua_id' => 'required|exists:users,id',
            'kandidat_wakil_id' => 'required|exists:users,id',
            'pemilihan_id' => 'required|exists:pemilihan,id',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'no_urut' => 'required|integer',
            'poster' => 'nullable|image|max:2048', // maksimal 2MB
        ]);

        // Handle file upload jika ada
        if ($request->hasFile('poster')) {
            // Hapus poster lama jika ada
            if ($kandidat->poster && Storage::disk('public')->exists($kandidat->poster)) {
                Storage::disk('public')->delete($kandidat->poster);
            }

            // Simpan poster baru
            $validated['poster'] = $request->file('poster')->store('poster_kandidat', 'public');
        }

        // Update data
        $kandidat->update($validated);
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Data kandidat berhasil diperbarui.');
        return redirect()->route('kandidat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $kandidat->delete();
        // Hapus poster jika ada
        if ($kandidat->poster && Storage::disk('public')->exists($kandidat->poster)) {
            Storage::disk('public')->delete($kandidat->poster);
        }
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Kandidat berhasil dihapus.');
        return redirect()->route('kandidat.index');
    }
}
