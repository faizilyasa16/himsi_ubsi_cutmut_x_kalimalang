<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KontenAlbum;
use App\Models\Album;
use Illuminate\Support\Facades\DB;

class KontenAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records to avoid duplicates
        // Note: konten_album records are already cleared in AlbumSeeder
        // DB::table('konten_album')->delete(); // Commented out as it's handled in AlbumSeeder

        // Get all albums from database
        $albums = Album::all();

        foreach ($albums as $album) {
            switch ($album->slug) {
                case 'himsi-sehat':
                    // Konten untuk album HIMSI Sehat
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null, // Assuming 'nama' is not required for this album
                        'foto' => 'foto/badmin1.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/badmin2.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/badmin3.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/badmin4.jpeg',
                    ]);
                    break;

                case 'campus-meetup-allstars-x-ubsi-himsi-study-club':
                    // Konten untuk album Campus Meetup
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub1.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub2.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub3.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub4.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub5.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub6.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub7.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub8.jpeg',
                    ]);
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub9.jpeg',
                    ]);
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/studyclub10.jpeg',
                    ]);
                    break;

                case 'sertijab-pengurus-himsi-2025':
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab1.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab2.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab3.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab4.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab5.jpeg',
                    ]);                
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab7.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab8.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab9.jpeg',
                    ]);
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'foto' => 'foto/sertijab10.jpeg',
                    ]);
                    
                    break;

                case 'himsi-berbagi-ramadan':
                    // Konten untuk album HIMSI Berbagi Ramadan
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi1.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi2.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi3.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi4.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi5.jpeg',
                    ]);
                    
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi6.jpeg',
                    ]);
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi7.jpeg',
                    ]);
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi8.jpeg',
                    ]);
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi9.jpeg',
                    ]);
                    KontenAlbum::create([
                        'album_id' => $album->id,
                        'nama' => null,
                        'foto' => 'foto/berbagi10.jpeg',
                    ]);
                    break;

            }
        }
    }
}
