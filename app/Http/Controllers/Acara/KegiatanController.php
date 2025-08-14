<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\Support\Str;
use App\Models\KategoriAcara;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\SlugGenerator;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use SlugGenerator;
    public function index()
    {
        // Ambil semua acara dengan relasi kategori
        $acara = Acara::with('kategori')->get();
        // Konfirmasi hapus dengan SweetAlert
        $title = 'Konfirmasi Hapus Acara';
        $text = "Apakah Anda yakin ingin menghapus acara ini? Semua data terkait akan hilang.";
        confirmDelete($title, $text);
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
            'slug'              => 'required|string|max:255|unique:acara,slug',
            'kategori_id'       => 'nullable|exists:kategori_acara,id',
            'nama'              => 'required|string|max:200',
            'deskripsi'         => 'nullable|string',
            'lokasi'            => 'nullable|string|max:100',
            'contact_person'    => 'nullable|string|max:100',
            'poster'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kuota'             => 'nullable|string|max:10',
            'status'            => 'required|in:draft,open,closed',
            'tanggal_mulai'     => 'required|date',
            'waktu_mulai'       => 'nullable|date_format:H:i',
            'tanggal_selesai'   => 'nullable|date|after_or_equal:tanggal_mulai',
            'waktu_selesai'     => 'nullable|date_format:H:i',
            'link_pendaftaran'  => 'nullable|string|max:200',
            'link_wa'           => 'nullable|string|max:200',
            'biaya'             => 'nullable|string|max:100',
            'payment_method'    => 'nullable|string|max:100',
            'payment_number'    => 'nullable|string|max:100',
            'payment_name'      => 'nullable|string|max:100',
        ]);

        // Upload poster jika ada
        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Acara::create($validated);

        Alert::success('Berhasil', 'Acara berhasil ditambahkan.');
        return redirect()->route('kegiatan-acara.index');
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
            'slug'              => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:acara,slug,' . $kegiatanAcara->id,
            'kategori_id'       => 'nullable|exists:kategori_acara,id',
            'nama'              => 'required|string|max:200',
            'deskripsi'         => 'nullable|string',
            'lokasi'            => 'nullable|string|max:100',
            'contact_person'    => 'nullable|string|max:100',
            'poster'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kuota'             => 'nullable|string|max:10',
            'status'            => 'required|in:draft,open,closed',
            'tanggal_mulai'     => 'required|date',
            'waktu_mulai'       => 'nullable|date_format:H:i',
            'tanggal_selesai'   => 'nullable|date|after_or_equal:tanggal_mulai',
            'waktu_selesai'     => 'nullable|date_format:H:i',
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

            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $kegiatanAcara->update($validated);

        Alert::success('Berhasil', 'Acara berhasil diperbarui.');
        return redirect()->route('kegiatan-acara.index');
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
        // Tampilkan pesan sukses
        // Menggunakan SweetAlert untuk notifikasi
        Alert::success('Berhasil', 'Acara berhasil dihapus.');
        return redirect()->route('kegiatan-acara.index');
    }
}
