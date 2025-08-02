<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\KegiatanAcaraTahunan;
use App\Charts\PenggunaPerTahun;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(KegiatanAcaraTahunan $kegiatanChart, PenggunaPerTahun $penggunaChart)
    {
        $users = User::all();

        // === Grafik chart tetap ===
        $kegiatanChart = $kegiatanChart->build();
        $penggunaChart = $penggunaChart->build();

        // === Anggota baru per tahun bergabung (created_at) ===
        $anggotaBaruPerTahun = User::select(DB::raw('YEAR(created_at) as tahun'), DB::raw('COUNT(*) as total'))
                                ->groupBy('tahun')
                                ->orderBy('tahun', 'desc')
                                ->pluck('total', 'tahun'); // hasil: [2025 => 5, 2024 => 10, ...]

        return view('user.dashboard.index', compact(
            'kegiatanChart',
            'users',
            'penggunaChart',
            'anggotaBaruPerTahun'
        ));
    }
}
