<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriAcara;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriAcara = KategoriAcara::all();
        return view('user.acara.kategori.index', compact('kategoriAcara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.acara.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriAcara::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori-acara.index')->with('success', 'Kategori acara berhasil ditambahkan.');
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
    public function edit(KategoriAcara $kategoriAcara)
    {
        return view('user.acara.kategori.edit', compact('kategoriAcara'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:kategori_acara,slug,' . $id,
            'deskripsi' => 'nullable|string',
        ]);

        $kategoriAcara = KategoriAcara::findOrFail($id);
        $kategoriAcara->update([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori-acara.index')->with('success', 'Kategori Acara berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoriAcara = KategoriAcara::findOrFail($id);
        $kategoriAcara->delete();

        return redirect()->route('kategori-acara.index')->with('success', 'Kategori Acara berhasil dihapus.');
    }
}
