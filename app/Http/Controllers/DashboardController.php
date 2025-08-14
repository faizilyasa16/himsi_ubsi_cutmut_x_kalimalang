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
        $users = User::whereIn('role', ['anggota', 'bph'])->count();

        // === Grafik chart tetap ===
        $kegiatanChart = $kegiatanChart->build();
        $penggunaChart = $penggunaChart->build();

        $anggota = User::whereIn('role', ['anggota', 'bph','alumni'])->count();

        return view('user.dashboard.index', compact(
            'kegiatanChart',
            'users',
            'penggunaChart',
            'anggota'
        ));
    }
}
