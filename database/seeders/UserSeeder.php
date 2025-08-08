<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // BPH (Badan Pengurus Harian)
        User::create([
            'nim' => '12230060',
            'name' => 'Muhamad Fachri',
            'email' => '12230060@bsi.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'ketua',
        ]);

        User::create([
            'nim' => '19230390',
            'name' => 'Reggy Helva Rezal',
            'email' => 'reggyhelva28@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'wakil_ketua',
        ]);

        User::create([
            'nim' => '19231010',
            'name' => 'Adi Andrianto',
            'email' => 'adiandrianto146@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'sekretaris',
        ]);

        User::create([
            'nim' => '12230105',
            'name' => 'Laurensia Stevanic Elizabeth',
            'email' => 'elizabethstevanic@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'bendahara',
        ]);

        // RSDM (Resource and Strategic Development Management)
        User::create([
            'nim' => '19240961',
            'name' => 'Andika Muhammad Rizky',
            'email' => 'andikaaa.muh.riz@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19240891',
            'name' => 'Andhika Syarifudin',
            'email' => 'andika15657@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '12230102',
            'name' => 'Arya Ramadhani',
            'email' => 'arya.ramadhani091@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19230089',
            'name' => 'Aqiila Aviani',
            'email' => 'aqiilaviani20@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19231429',
            'name' => 'Faiz Ilyasa',
            'email' => 'faizilyasa16@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19242299',
            'name' => 'Mochamad Fahri Putra Pratama',
            'email' => 'moch.fahriputra.p@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19241675',
            'name' => 'Muhamad Nizam Zuhayr',
            'email' => 'nizamzuhayr12@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19241701',
            'name' => 'Rafly Dwi Maulana',
            'email' => 'raflydwimaulana9@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19242003',
            'name' => 'Herlambang Chandra Radhitya',
            'email' => 'radhityachandra12@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19242185',
            'name' => 'Tennoo Ramadhan Kurniawan',
            'email' => 'tenoramadhan1210@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        User::create([
            'nim' => '19241360',
            'name' => 'Naufal Putra Winawan',
            'email' => 'putrawnaufal@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'rsdm',
        ]);

        // LITBANG (Penelitian dan Pengembangan)
        User::create([
            'nim' => '12230101',
            'name' => 'Cahya Alia',
            'email' => 'cahyarismayanti@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19231416',
            'name' => 'Aisyah Putri Regardo',
            'email' => 'aisyahputriregardo@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19231904',
            'name' => 'Arnanda Surya Mukti',
            'email' => 'arnandasr@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19231769',
            'name' => 'Yuni Saidah',
            'email' => 'yunisaidah05@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19231251',
            'name' => 'Eriel Firman Suandanis',
            'email' => 'steelblack222@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19231213',
            'name' => 'Fitra Hakiki Firdaus',
            'email' => 'fitrahakikif@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19240747',
            'name' => 'Adityo Nurcholis Wibisono',
            'email' => 'adityo.nw10@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '12230042',
            'name' => 'Muhammad Rochman Triatmojo',
            'email' => 'muhammadrohmantriat@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19242335',
            'name' => 'Afifudin',
            'email' => 'afifudin141213@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19242089',
            'name' => 'Najwan Muyassar',
            'email' => 'najwanmuyassar16@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        User::create([
            'nim' => '19231413',
            'name' => 'Danu Pangestu',
            'email' => 'pangestudanu92@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'litbang',
        ]);

        // PENDIDIKAN
        User::create([
            'nim' => '12230001',
            'name' => 'Dafina Nabila Putri',
            'email' => 'dafinanabila122@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'pendidikan',
        ]);

        User::create([
            'nim' => '19231019',
            'name' => 'Indah Tri Rahmawati',
            'email' => 'indhrhmwt3084@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'pendidikan',
        ]);

        User::create([
            'nim' => '19230049',
            'name' => 'Tiara Falensia',
            'email' => 'tiarafalensia2@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'pendidikan',
        ]);

        User::create([
            'nim' => '19231624',
            'name' => 'Ummi Kulsum',
            'email' => 'ummikalsumbahenol@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'pendidikan',
        ]);

        User::create([
            'nim' => '19240043',
            'name' => 'Sauqi Danang Prastowo',
            'email' => 'danangprastowo99@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'pendidikan',
        ]);

        User::create([
            'nim' => '19241262',
            'name' => 'Bilal Nur Akmal',
            'email' => 'bllnrkml12@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'pendidikan',
        ]);

        User::create([
            'nim' => '19230786',
            'name' => 'Christian Octavio Arshendy',
            'email' => 'christian.octavio27@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'pendidikan',
        ]);

        // KOMINFO (Komunikasi dan Informasi)
        User::create([
            'nim' => '19241201',
            'name' => 'Aulia An Najmi',
            'email' => 'aulianajmi26@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bph',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19231620',
            'name' => 'Hertha Berlina',
            'email' => 'herthaharyanto@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19232215',
            'name' => 'Rahayu',
            'email' => 'Rahayuorlando@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19231214',
            'name' => 'Rifaa Tumaadhira Adiibah',
            'email' => 'tumaadhirarifaa05@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19231721',
            'name' => 'Farabi Rizki Januar',
            'email' => 'farabijkt006@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19241849',
            'name' => 'Andrau Stevanus Parada Butar-butar',
            'email' => 'andraustefanus@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19241441',
            'name' => 'Septian Ramadhan',
            'email' => 'ian.septianramadhan@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19242254',
            'name' => 'Muhammad Rizky Ferdiansyah',
            'email' => 'rizkya7y123@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19241408',
            'name' => 'Muhammad Erry Saputra',
            'email' => 'muhammadxrry@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19240864',
            'name' => 'Rakha Ikbar Amim',
            'email' => 'rakhaikbar01@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19240281',
            'name' => 'Kesya Jelita',
            'email' => 'keyzajelitaahmad@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19240930',
            'name' => 'Joel Esekiel Langkudi',
            'email' => 'joellangkudi2@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

        User::create([
            'nim' => '19241919',
            'name' => 'Renu Yusmiar Kusumo',
            'email' => 'renuyusmiark@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota',
            'divisi' => 'kominfo',
        ]);

    }
}
