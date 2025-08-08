<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi as Struktur;
use Illuminate\Support\Facades\DB;

class StrukturSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run(): void
    {
        
        // Create new struktur record with the image
        Struktur::create([
            'konten' => 'struktur/himsi.png', // Path to the image file
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}