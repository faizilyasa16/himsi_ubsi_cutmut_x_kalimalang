<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';

    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'lokasi',
        'contact_person',
        'poster',
        'kuota',
        'status',
        'slug',
        'waktu_mulai',
        'waktu_selesai',
        'link_pendaftaran',
        'link_wa',
        'biaya',
        'payment_method',
        'payment_number',
        'payment_name',
    ];

    /**
     * Relasi ke kategori_acara
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriAcara::class, 'kategori_id');
    }


}
