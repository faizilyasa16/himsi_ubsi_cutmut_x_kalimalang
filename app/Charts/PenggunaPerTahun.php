<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;
use Carbon\Carbon;

class PenggunaPerTahun
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Ambil 5 tahun terakhir (otomatis)
        $currentYear = Carbon::now()->year;
        $startYear = $currentYear - 4; // 5 tahun terakhir
        
        $tahunData = [];
        $penggunaData = [];
        
        // Loop untuk 5 tahun terakhir
        for ($tahun = $startYear; $tahun <= $currentYear; $tahun++) {
            $jumlahPengguna = User::whereYear('created_at', $tahun)->count();
            
            $tahunData[] = (string)$tahun;
            $penggunaData[] = $jumlahPengguna;
        }

        return $this->chart->lineChart()
            ->setTitle('Statistik Pengguna Baru Per Tahun')
            ->setSubtitle('Jumlah pengguna yang mendaftar dalam 5 tahun terakhir')
            ->setLabels($tahunData)
            ->setDataset([
                [
                    'name' => 'Jumlah Pengguna',
                    'data' => $penggunaData
                ]
            ])
            ->setHeight(350)
            ->setColors(['#10B981']) // Warna hijau emerald
            ->setGrid()
            ->setMarkers(['#10B981'], 6, 6);
    }
}
