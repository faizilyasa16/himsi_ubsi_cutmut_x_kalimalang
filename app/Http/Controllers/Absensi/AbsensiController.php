<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KegiatanAbsensi;
use App\Models\Absensi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use SweetAlert2\Laravel\Swal;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = KegiatanAbsensi::with('absensi')->get();
        return view('user.absensi.kelola.index', compact('absensi'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function edit($id)
    {
        // Ambil kegiatan beserta absensi & user
        $kegiatan = KegiatanAbsensi::with('absensi.user')->findOrFail($id);

        // Ambil hanya user yang sudah punya absensi untuk kegiatan ini
        $userIds = $kegiatan->absensi->pluck('user_id');
        $users = User::whereIn('id', $userIds)->get();

        return view('user.absensi.kelola.edit', compact('kegiatan', 'users'));
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input (opsional)
        $request->validate([
            'absensi' => 'required|array',
            'absensi.*.status' => 'nullable|in:hadir,tidak_hadir,izin',
            'absensi.*.keterangan' => 'nullable|string|max:255',
        ]);

        $kegiatan = KegiatanAbsensi::with('absensi')->findOrFail($id);

        foreach ($request->absensi as $userId => $data) {
            // Cek apakah user sudah terdaftar di absensi kegiatan ini
            $absen = $kegiatan->absensi->firstWhere('user_id', $userId);

            if ($absen) {
                // Make sure status key exists before using it
                // If status is not provided in the request, keep the current status
                $status = isset($data['status']) ? $data['status'] : $absen->status;
                
                $updateData = [
                    'status'     => $status,
                    'keterangan' => $data['keterangan'] ?? null,
                ];
                
                // Update status dan keterangan
                $absen->update($updateData);
            }
            // Kalau user belum ada, abaikan (tidak membuat entri baru)
        }
        Alert::success('Berhasil', 'Data absensi berhasil diperbarui.');
        return redirect()->route('kelola-absensi.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
