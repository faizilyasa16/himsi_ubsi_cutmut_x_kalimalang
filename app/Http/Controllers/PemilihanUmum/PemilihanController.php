<?php

namespace App\Http\Controllers\PemilihanUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilihan;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class PemilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pemilihan
        $pemilihan = Pemilihan::all();
        // Konfirmasi hapus dengan SweetAlert
        $title = 'Konfirmasi Hapus Pemilihan';
        $text = "Apakah Anda yakin ingin menghapus pemilihan ini? Semua data terkait akan hilang.";
        confirmDelete($title, $text);
        return view('user.pemilihan-umum.pemilihan.index', compact('pemilihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pemilihan-umum.pemilihan.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'status' => 'required|in:belum-mulai,mulai,selesai',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan ke database
        Pemilihan::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Pemilihan berhasil ditambahkan.');
        return redirect()->route('pemilihan.index');
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
    public function edit(Pemilihan $pemilihan)
    {
        return view('user.pemilihan-umum.pemilihan.edit', compact('pemilihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemilihan $pemilihan)
    {
        $validated =$request->validate([
            'nama' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'status' => 'required|in:belum-mulai,mulai,selesai',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        $pemilihan->update($validated);
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Data pemilihan berhasil diperbarui.');
        return redirect()->route('pemilihan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemilihan = Pemilihan::findOrFail($id);
        $pemilihan->delete();
        Alert::success('Berhasil', 'Pemilihan berhasil dihapus.');
        return redirect()->route('pemilihan.index');
    }
}
