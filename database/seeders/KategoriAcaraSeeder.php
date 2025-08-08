<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriAcara;
use Illuminate\Support\Facades\DB;

class KategoriAcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records to avoid duplicates
        // First delete dependent records, then parent records
        DB::table('acara')->delete();
        DB::table('kategori_acara')->delete();

        // Create kategori acara entries
        KategoriAcara::create([
            'nama' => 'Seminar & Workshop',
            'slug' => 'seminar-workshop',
            'deskripsi' => 'Kategori acara untuk kegiatan seminar dan workshop yang bertujuan untuk meningkatkan pengetahuan dan keterampilan mahasiswa sistem informasi.',
        ]);

        KategoriAcara::create([
            'nama' => 'Kompetisi',
            'slug' => 'kompetisi',
            'deskripsi' => 'Kategori acara untuk berbagai kompetisi seperti programming contest, UI/UX design, dan kompetisi teknologi lainnya.',
        ]);

        KategoriAcara::create([
            'nama' => 'Kegiatan Sosial',
            'slug' => 'kegiatan-sosial',
            'deskripsi' => 'Kategori acara untuk kegiatan bakti sosial, donor darah, dan berbagai aktivitas kepedulian sosial lainnya.',
        ]);

        KategoriAcara::create([
            'nama' => 'Olahraga & Kesehatan',
            'slug' => 'olahraga-kesehatan',
            'deskripsi' => 'Kategori acara untuk turnamen olahraga, senam, dan kegiatan yang berkaitan dengan kesehatan fisik mahasiswa.',
        ]);

        KategoriAcara::create([
            'nama' => 'Organisasi & Kepemimpinan',
            'slug' => 'organisasi-kepemimpinan',
            'deskripsi' => 'Kategori acara untuk kegiatan organisasi seperti sertijab, rapat koordinasi, dan pelatihan kepemimpinan.',
        ]);
        KategoriAcara::create([
            'nama' => 'HIMSI',
            'slug' => 'himsi',
            'deskripsi' => 'Kategori acara untuk kegiatan HIMSI seperti rapat, diskusi, dan kegiatan internal organisasi.',
        ]);
        KategoriAcara::create([
            'nama' => 'Hiburan & Rekreasi',
            'slug' => 'hiburan-rekreasi',
            'deskripsi' => 'Kategori acara untuk kegiatan hiburan, gathering, study tour, dan aktivitas rekreasi lainnya.',
        ]);
    }
}
