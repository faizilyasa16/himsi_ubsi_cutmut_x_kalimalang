<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = [
        'kegiatan_id',
        'user_id',
        'status',
        'keterangan', // Keterangan tambahan jika ada
    ];

    /**
     * Relasi ke KegiatanAbsensi
     */
    public function kegiatan()
    {
        return $this->belongsTo(KegiatanAbsensi::class, 'kegiatan_id');
    }
    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
