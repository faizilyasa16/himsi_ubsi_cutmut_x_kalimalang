<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AbsenUserController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('kegiatan')
            ->where('user_id', Auth::id())
            ->whereHas('kegiatan', function ($query) {
                $query->whereIn('status', ['open', 'closed']);
            })
            ->paginate(6); // bisa sesuaikan jumlah per halaman

        return view('user.absensi.absensi.index', compact('absensi'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'kegiatan_id' => 'required|exists:kegiatan_absensi,id',
            'status' => 'required|in:hadir,izin,tidak hadir',
            'keterangan' => 'nullable|string|max:255',
        ]);

        try {
            $userId = Auth::id();
            $kegiatanId = $validated['kegiatan_id'];

            // Cek apakah sudah ada absensi
            $absen = Absensi::where('user_id', $userId)
                            ->where('kegiatan_id', $kegiatanId)
                            ->first();

            if ($absen) {
                // Update absensi yang sudah ada
                $absen->update([
                    'status' => $validated['status'],
                    'keterangan' => $validated['keterangan'],
                ]);
                Alert::info('Diperbarui', 'Absensi berhasil diperbarui.');
            } else {
                // Buat baru
                Absensi::create([
                    'user_id' => $userId,
                    'kegiatan_id' => $kegiatanId,
                    'status' => $validated['status'],
                    'keterangan' => $validated['keterangan'],
                ]);
                Alert::success('Berhasil', 'Absensi berhasil disimpan.');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan absensi: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan absensi. Silakan coba lagi.');
        }
    }

}
