<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KesanPesan;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class KesanPesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records
        DB::table('kesan-pesan')->delete();

        // Get users berdasarkan nama
        $reggy = User::where('name', 'like', '%Reggy Helva%')->first();
        $dafina = User::where('name', 'like', '%Dafina Nabila%')->first();
        $farabi = User::where('name', 'like', '%Farabi%')->first();
        $aulia = User::where('name', 'like', '%Aulia An Najmi%')->first();
        $andika = User::where('name', 'like', '%Andika Muhammad Rizky%')->first();
        $indah = User::where('name', 'like', '%Indah Tri%')->first();

        // Kesan Pesan dari Reggy Helva - Anggota Kominfo
        if ($reggy) {
            KesanPesan::create([
                'user_id' => $reggy->id,
                'kesan_pesan' => 'Bagi saya Himsi bukan hanya sekadar organisasi, melainkan rumah kedua untuk bermain, cerita, belajar dan tumbuh kembang bersama. Banyak momen seru yang sudah dilalui, sederhana namun menyenangkan',
                'status' => 'active',
                'created_at' => '2025-08-06 14:51:38',
                'updated_at' => '2025-08-06 14:51:38',
            ]);
        }

        // Kesan Pesan dari Dafina Nabila Putri - Koor Pendidikan
        if ($dafina) {
            KesanPesan::create([
                'user_id' => $dafina->id,
                'kesan_pesan' => 'Di himsi ga cuma belajar tentang komunikasi atau pengalaman organisasi, tapi juga belajar memahami informasi dan chemistry dalam projek yang dijalani',
                'status' => 'active',
                'created_at' => '2025-08-06 17:29:21',
                'updated_at' => '2025-08-06 17:29:21',
            ]);
        }

        // Kesan Pesan dari Farabi R - Anggota Kominfo
        if ($farabi) {
            KesanPesan::create([
                'user_id' => $farabi->id,
                'kesan_pesan' => 'Saya senang berada di bagian menjadi Himsi, terutama Himsi cutmut x kalimalang, menambah pengalaman saya dalam ber organisasi, Thanks Buat semua nyaa. Semoga himsi bisa memunculkan ide ide baru.',
                'status' => 'active',
                'created_at' => '2025-08-07 10:14:22',
                'updated_at' => '2025-08-07 10:14:22',
            ]);
        }

        // Kesan Pesan dari Aulia An Najmi - Koor kominfo
        if ($aulia) {
            KesanPesan::create([
                'user_id' => $aulia->id,
                'kesan_pesan' => 'Kesan yang aku dapat dari himpunan ini cukup besar ya, karena selain menambah pengalaman dan kegiatan aku juga bisa menemukan orang-orang baru yang hebat dan baik layaknya keluarga baru di sini. Aku harap Himsi ini bisa berkembang lebih sempurna lagi seiring berjalannya teknologi dan kemajuan yang ada',
                'status' => 'active',
                'created_at' => '2025-08-07 12:02:19',
                'updated_at' => '2025-08-07 12:02:19',
            ]);
        }

        // Kesan Pesan dari Andika Muhammad Rizky - Koor RSDM
        if ($andika) {
            KesanPesan::create([
                'user_id' => $andika->id,
                'kesan_pesan' => 'Gak ada organisasi yang sempurna semua harus saling melengkapi, ini adalah pertama kali guaa ikut organisasi dan yap semua orang pasti punya tujuannya kenapa mereka masuk organisasi dan di HIMSI ini gua berterima kasih karena guaa bisa komitmen dalam 1 periode ini. Memang gak lama tapi banyak pengalaman yang di ambil dan semua itu pasti bakal gua evaluasi untuk perjalanan kedepannyaa. Intinyaa adalah jangan terus terang menyerah, kalian bukan tidak bisa tapi belum memulainyaa lalu jika memang sudah memulai dan kalian ngerasa ngestuck kalian harus ingat apa alasan kalian memilih jalan itu dan apa yang kalian ingin tuju ?',
                'status' => 'active',
                'created_at' => '2025-08-07 14:57:04',
                'updated_at' => '2025-08-07 14:57:04',
            ]);
        }

        // Kesan Pesan dari Indah Tri Rahmawati - Anggota Pendidikan
        if ($indah) {
            KesanPesan::create([
                'user_id' => $indah->id,
                'kesan_pesan' => 'Selama gabung di HIMSI, banyak banget hal seru dan berkesan. Semoga kedepannya semakin kreatif, dan jadi tempat yg asik buat belajar dan berkembang. Buat pengurus selanjutnya, semangat terus dan tetap kompak ya!',
                'status' => 'active',
                'created_at' => '2025-08-07 16:37:25',
                'updated_at' => '2025-08-07 16:37:25',
            ]);
        }
    }
}
