<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class KegiatanAbsensi extends Model
{
    use HasFactory;
    // Jika nama tabel berbeda dari default (kegiatan_absensi), tentukan di sini
    protected $table = 'kegiatan_absensi';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'waktu',
        'lokasi',
        'deskripsi',
        'status',
        'slug',
        'code', // Tambahkan kolom kode jika diperlukan
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'kegiatan_id');
    }
}
