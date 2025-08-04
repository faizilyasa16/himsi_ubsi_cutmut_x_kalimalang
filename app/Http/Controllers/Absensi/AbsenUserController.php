<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\KegiatanAbsensi;
use Illuminate\Support\Arr;

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
        'status' => 'required|in:hadir,izin,tidak_hadir',
        'keterangan' => 'nullable|string|max:255',
        'kode' => 'nullable|string|max:10',
    ]);

    try {
        $userId = Auth::id();
        $kegiatanId = $validated['kegiatan_id'];
        $status = $validated['status'];

        // Ambil kegiatan
        $kegiatan = KegiatanAbsensi::findOrFail($kegiatanId);

        // Validasi kode hanya jika status = hadir dan kegiatan punya kode
        if ($status === 'hadir' && $kegiatan->code) {
            $inputKode = $validated['kode'] ?? null;

            if (empty($inputKode)) {
                return redirect()->back()->withErrors(['kode' => 'Kode kehadiran wajib diisi.'])->withInput();
            }

            if ($inputKode !== $kegiatan->code) {
                return redirect()->back()->withErrors(['kode' => 'Kode yang dimasukkan tidak valid untuk kegiatan ini.'])->withInput();
            }
        }

        // Cek apakah sudah absen
        $absen = Absensi::where('user_id', $userId)
                        ->where('kegiatan_id', $kegiatanId)
                        ->first();

        if ($absen) {
            $absen->update([
                'status' => $status,
                'keterangan' => $validated['keterangan'],
                'kode' => $validated['kode'] ?? null,
            ]);
            Alert::info('Diperbarui', 'Absensi berhasil diperbarui.');
        } else {
            Absensi::create([
                'user_id' => $userId,
                'kegiatan_id' => $kegiatanId,
                'status' => $status,
                'keterangan' => $validated['keterangan'],
                'kode' => $validated['kode'] ?? null,
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
