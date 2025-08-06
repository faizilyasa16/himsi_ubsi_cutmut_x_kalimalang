<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $struktur = StrukturOrganisasi::first(); // ambil data pertama (karena biasanya cuma satu)

        return view('user.struktur.index', compact('struktur'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'konten' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Cek apakah sudah ada data
        $struktur = StrukturOrganisasi::first();

        // Hapus file lama jika ada
        if ($struktur && Storage::exists('public/' . $struktur->konten)) {
            Storage::delete('public/' . $struktur->konten);
        }

        // Upload file baru
        $path = $request->file('konten')->store('struktur', 'public');

        // Simpan atau perbarui data
        StrukturOrganisasi::updateOrCreate(
            ['id' => $struktur->id ?? null],
            ['konten' => $path]
        );
        Alert::success('Struktur organisasi berhasil diperbarui!');
        return redirect()->route('struktur.index')->with('success', 'Struktur organisasi berhasil disimpan!');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
