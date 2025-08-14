<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Acara;
use App\Models\KategoriAcara;
use Illuminate\Support\Facades\DB;

class AcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records to avoid duplicates
        // Note: acara records are already cleared in KategoriAcaraSeeder
        // DB::table('acara')->delete(); // Commented out as it's handled in KategoriAcaraSeeder

        // Get kategori_id for "Seminar & Workshop"
        $kategoriSeminar = KategoriAcara::where('slug', 'seminar-workshop')->first();

        // Create the Campus Meetup event
        Acara::create([
            'kategori_id' => $kategoriSeminar ? $kategoriSeminar->id : 1,
            'nama' => 'CAMPUS MEETUP HIMSI Study Club 2025 X AllStars Academy Indonesia',
            'deskripsi' => 'Kegiatan CAMPUS MEETUP HIMSI Study Club 2025 X AllStars Academy Indonesia dengan tema "Exploring Blockchain & Web3 Technology" - Educate, Empower, Elevate through Decentralized Innovation.

Dalam kegiatan ini, peserta akan mendapatkan benefit:
✅ Kenalan langsung dengan konsep Blockchain & Web3
✅ Dapat wawasan karier di industri Web3  
✅ Ikut workshop mini bikin dApp tanpa perlu modal
✅ Ngobrol bareng komunitas Allstars Academy Indonesia
✅ e-certificate
✅ Ada doorprize menarik

Pembicara utama: Laura Stephanie Phang (Country Manager – Allstars Academy Indonesia)

Wajib untuk diikuti untuk teman-teman yang mau eksplor hal baru!, khususnya fakultas teknik dan Informatika, dan juga terbuka umum untuk seluruh mahasiswa UBSI lain yang tertarik!',
            'lokasi' => 'Hotel 88 Bekasi',
            'contact_person' => '085710430631',
            'poster' => 'posters/campus-meetup-himsi-2025.png',
            'kuota' => 100,
            'status' => 'closed',
            'slug' => 'campus-meetup-himsi-study-club-2025-x-allstars-academy-indonesia',
            'tanggal_mulai' => '2025-06-28',
            'waktu_mulai' => '13:00:00',
            'tanggal_selesai' => '2025-06-28',
            'waktu_selesai' => '16:00:00',
            'link_pendaftaran' => 'https://lu.ma/e7bwnown',
            'biaya' => 'gratis',
            'payment_method' => null,
            'payment_number' => null,
            'payment_name' => null,
        ]);

        // Get kategori_id for "Kegiatan Sosial"
        $kategoriSosial = KategoriAcara::where('slug', 'kegiatan-sosial')->first();

        // Create the BERBAGI KASIH & PEDULI event
        Acara::create([
            'kategori_id' => $kategoriSosial ? $kategoriSosial->id : 1,
            'nama' => 'BERBAGI KASIH & PEDULI',
            'deskripsi' => '✨ BERBAGI KASIH & PEDULI ✨

Indahnya berbagi di bulan Ramadhan! 🌙✨

Himpunan Mahasiswa Sistem Informasi (HIMSI) Cutmutiah & Kalimalang X OJT Kalimalang mengajak kawan-kawan bagian dari kebaikan! ✨ 
Bantu adik-adik yatim & piatu dengan donasi terbaikmu. Sekecil apa pun bantuanmu, berarti besar buat mereka.

💰 Cara Berdonasi:
✅ Seabank: 901261951189 (Anisa Fitri)
✅ Dana/Gopay: 082114396332 (Laurensia Stevanic)
✅ Bank BCA: 7411101499 (Muhamad Fachri)

Mari bersama-sama menebar kebaikan dan keberkahan di bulan yang penuh rahmat ini! 🌟

"Sedekah yang paling utama adalah sedekah di bulan Ramadhan." (HR. At-Tirmidzi)

#HIMSIBerbagi #RamadhanBerkah #BerbagiItuIndah #HIMSICUTMUTIAHXOJTKALIMALANG',
            'lokasi' => 'Kampus UBSI Kalimalang',
            'contact_person' => '082114396332',
            'poster' => 'posters/berbagi-kasih-peduli-2025.png',
            'kuota' => null, // Open donation, no participant limit
            'status' => 'closed',
            'slug' => 'berbagi-kasih-peduli-ramadhan-2025',
            'tanggal_mulai' => '2025-03-08',
            'waktu_mulai' => null, // Donasi bisa kapan saja
            'tanggal_selesai' => '2025-03-20',
            'waktu_selesai' => null, // Sampai akhir hari
            'link_pendaftaran' => null, // No registration needed for donation
            'link_wa' => null,
            'biaya' => 'donasi sukarela',
            'payment_method' => 'Seabank/Dana/Gopay/BCA',
            'payment_number' => '901261951189 (Seabank) | 082114396332 (Dana/Gopay) | 7411101499 (BCA)',
            'payment_name' => 'Anisa Fitri (Seabank) | Laurensia Stevanic (Dana/Gopay) | Muhamad Fachri (BCA)',
        ]);
    }
}
