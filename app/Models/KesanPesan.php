<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Testing\Fluent\Concerns\Has;

class KesanPesan extends Model
{
    use HasFactory;
    protected $table = 'kesan-pesan';
    protected $fillable = [
        'user_id',
        'kesan',
        'pesan',
        'status', // Tambahkan kolom status
    ];
    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
