<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

    protected $table = 'kandidat';

    protected $fillable = [
        'kandidat_ketua_id',
        'kandidat_wakil_id',
        'pemilihan_id',
        'visi',
        'misi',
        'no_urut',
        'poster',
    ];

    // Relasi ke User sebagai Ketua
    public function ketua()
    {
        return $this->belongsTo(User::class, 'kandidat_ketua_id');
    }

    // Relasi ke User sebagai Wakil
    public function wakil()
    {
        return $this->belongsTo(User::class, 'kandidat_wakil_id');
    }

    // Relasi ke Pemilihan
    public function pemilihan()
    {
        return $this->belongsTo(Pemilihan::class);
    }
}
