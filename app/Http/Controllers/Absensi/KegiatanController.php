<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\KegiatanAbsensi;
use App\Models\Absensi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kegiatan absensi
        $kegiatan = KegiatanAbsensi::all();
        $title = 'Konfirmasi Hapus Kegiatan Absensi';
        $text = "Apakah Anda yakin ingin menghapus kegiatan ini? Semua data absensi terkait akan hilang.";
        confirmDelete($title, $text);
        return view('user.absensi.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.absensi.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'waktu'     => 'required|date_format:Y-m-d\TH:i',
            'lokasi'    => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'status'    => 'required|in:draft,open,closed',
        ]);

        // Buat slug unik
        $slug = Str::slug($validated['nama']);
        $originalSlug = $slug;
        $counter = 1;
        while (KegiatanAbsensi::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        // Simpan kegiatan
        $kegiatan = KegiatanAbsensi::create($validated);

        // Ambil semua user yang wajib absen
        $users = User::whereIn('role', ['anggota', 'bph'])->get();

        // Insert absensi kosong per user
        foreach ($users as $user) {
            Absensi::create([
                'kegiatan_id' => $kegiatan->id,
                'user_id'     => $user->id,
                'keterangan'  => null,
            ]);
        }
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Kegiatan & absensi berhasil ditambahkan.');
        return redirect()->route('kegiatan-absensi.index');
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
        $kegiatan = KegiatanAbsensi::where('slug', $slug)->firstOrFail();
        return view('user.absensi.kegiatan.edit', compact('kegiatan'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $kegiatan = KegiatanAbsensi::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'waktu' => 'required|date_format:Y-m-d\TH:i',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'status' => 'required|in:draft,open,closed',
        ]);

        // Buat slug dari nama
        $validated['slug'] = Str::slug($validated['nama']);

        // Update ke database
        $kegiatan->update($validated);
        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Kegiatan berhasil diperbarui.');
        return redirect()->route('kegiatan-absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = KegiatanAbsensi::find($id);
        $kegiatan->delete();
        
        Alert::success('Berhasil', 'Kegiatan berhasil dihapus.');
        return redirect()->route('kegiatan-absensi.index');
    }
}
