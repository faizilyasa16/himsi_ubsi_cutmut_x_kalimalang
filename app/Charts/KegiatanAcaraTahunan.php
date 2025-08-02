<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Acara;
use Carbon\Carbon;

class KegiatanAcaraTahunan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Ambil tahun saat ini
        $currentYear = Carbon::now()->year;
        
        // Nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        
        // Array untuk menyimpan jumlah kegiatan per bulan
        $kegiatanPerBulan = [];
        
        // Loop untuk setiap bulan
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $jumlahKegiatan = Acara::whereYear('waktu_mulai', $currentYear)
                                   ->whereMonth('waktu_mulai', $bulan)
                                   ->where('status', 'published')
                                   ->count();
            
            $kegiatanPerBulan[] = $jumlahKegiatan;
        }

        return $this->chart->barChart()
            ->setTitle('Statistik Kegiatan Acara Tahun ' . $currentYear)
            ->setSubtitle('Jumlah kegiatan yang diadakan setiap bulan')
            ->setLabels($bulanIndonesia)
            ->setDataset([
                [
                    'name' => 'Jumlah Kegiatan',
                    'data' => $kegiatanPerBulan
                ]
            ])
            ->setHeight(350)
            ->setColors(['#4F46E5']) // Warna biru indigo
            ->setGrid();
    }
}
