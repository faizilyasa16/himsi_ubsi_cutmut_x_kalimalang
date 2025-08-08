<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records to avoid duplicates
        // Use delete instead of truncate to avoid foreign key constraint issues
        DB::table('konten_album')->delete();
        DB::table('album')->delete();
        
        // 1. HIMSI Sehat (combined olahraga activities)
        Album::create([
            'nama' => 'HIMSI Sehat',
            'tahun' => date('Y'),
            'slug' => 'himsi-sehat',
            'deskripsi' => 'Dokumentasi rangkaian kegiatan olahraga yang diselenggarakan oleh HIMSI UBSI. Program ini bertujuan untuk menjaga kesehatan fisik dan mental mahasiswa serta mempererat tali silaturahmi antar mahasiswa sistem informasi.',
        ]);
        
        // 2. Study Club - UI/UX Workshop
        Album::create([
            'nama' => 'Campus Meetup Allstars x UBSI (HIMSI Study Club)',
            'tahun' => date('Y'),
            'slug' => 'campus-meetup-allstars-x-ubsi-himsi-study-club',
            'deskripsi' => 'Dokumentasi acara Campus Meetup Allstars x UBSI yang diselenggarakan oleh HIMSI Study Club. Kegiatan ini merupakan kolaborasi dengan komunitas teknologi untuk sharing knowledge, networking, dan pengembangan skill mahasiswa sistem informasi dalam bidang teknologi terkini.',
        ]);
        
        // 3. Sertijab (Serah Terima Jabatan)
        Album::create([
            'nama' => 'Sertijab Pengurus HIMSI 2025',
            'tahun' => '2025',
            'slug' => 'sertijab-pengurus-himsi-2025',
            'deskripsi' => 'Dokumentasi acara serah terima jabatan dari pengurus HIMSI periode 2024 kepada pengurus baru periode 2025. Acara ini menandai pergantian kepemimpinan dan regenerasi organisasi.',
        ]);
        
        // 4. HIMSI Berbagi untuk Bulan Puasa
        Album::create([
            'nama' => 'HIMSI Berbagi Ramadan',
            'tahun' => date('Y'),
            'slug' => 'himsi-berbagi-ramadan',
            'deskripsi' => 'Dokumentasi kegiatan HIMSI Berbagi selama bulan Ramadan berupa buka puasa bersama, pembagian takjil, santunan anak yatim, dan kegiatan sosial lainnya. Program ini merupakan bentuk kepedulian dan berbagi kebahagiaan dengan sesama di bulan yang penuh berkah.',
        ]);
    }
}