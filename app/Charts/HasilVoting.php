<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Voting;
use App\Models\Kandidat;
use App\Models\Pemilihan;

class HasilVoting
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Pemilihan $pemilihan): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Get all candidates for this election
        $kandidatList = $pemilihan->kandidat;
        
        $labels = [];
        $data = [];
        
        foreach ($kandidatList as $kandidat) {
            // Get candidate name (using ketua's name or both names)
            $namaKandidat = $kandidat->ketua->name;
            if ($kandidat->wakil) {
                $namaKandidat .= ' & ' . $kandidat->wakil->name;
            }
            
            // Count votes for this candidate
            $jumlahVote = Voting::where('kandidat_id', $kandidat->id)
                                ->where('pemilihan_id', $pemilihan->id)
                                ->count();
            
            $labels[] = $namaKandidat;
            $data[] = $jumlahVote;
        }

        return $this->chart->pieChart()
            ->setTitle('Hasil Pemilihan')
            ->setSubtitle('Jumlah suara per kandidat')
            ->setLabels($labels)
            ->setDataset($data)
            ->setColors(['#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#6366F1'])
            ->setGrid();
    }
}