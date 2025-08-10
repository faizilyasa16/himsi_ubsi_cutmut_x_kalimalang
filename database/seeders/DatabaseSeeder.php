<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Database\Seeders\AdminSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AlbumSeeder;
use Database\Seeders\KontenAlbumSeeder;
use Database\Seeders\KategoriAcaraSeeder;
use Database\Seeders\StrukturSeeder;
use Database\Seeders\KesanPesanSeeder;
use Database\Seeders\AcaraSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            StrukturSeeder::class,
            KategoriAcaraSeeder::class,  // Run this before AcaraSeeder
            AcaraSeeder::class,
            AlbumSeeder::class,
            KontenAlbumSeeder::class,    // Run this after AlbumSeeder
            KesanPesanSeeder::class,
        ]);

    }
}
