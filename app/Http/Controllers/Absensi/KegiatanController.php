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
            'slug'      => 'required|string|max:255|unique:kegiatan_absensi,slug',
            'status'    => 'required|in:draft,open,closed',
            'code'      => 'nullable|string|max:10', // Tambahkan validasi untuk kode
        ]);

        // Buat slug dari nama
        $validated['slug'] = Str::slug($validated['nama']);

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
                'status'      => null,
                'kode'        => null, // Gunakan kode dari kegiatan jika ada
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
            'code' => 'nullable|string|max:10', // Tambahkan validasi untuk kode
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        $statusSebelumnya = $kegiatan->status;

        // Update kegiatan
        $kegiatan->update($validated);

        if ($statusSebelumnya !== 'closed' && $validated['status'] === 'closed') {
            $userIdsYangSudahAbsen = Absensi::where('kegiatan_id', $kegiatan->id)
                                    ->whereNotNull('status')
                                    ->where('status', '!=', '')
                                    ->pluck('user_id')
                                    ->toArray();

            $userIdsSemua = User::whereIn('role', ['anggota', 'bph'])->pluck('id')->toArray();

            $userIdsYangBelumAbsen = array_diff($userIdsSemua, $userIdsYangSudahAbsen);

            foreach ($userIdsYangBelumAbsen as $userId) {
                $absensi = Absensi::where('user_id', $userId)
                        ->where('kegiatan_id', $kegiatan->id)
                        ->first();
                        
                if ($absensi) {
                    // Update record yang sudah ada
                    $absensi->update([
                        'status' => 'tidak_hadir',
                        'updated_at' => now(),
                    ]);
                } 
            }
        }

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
