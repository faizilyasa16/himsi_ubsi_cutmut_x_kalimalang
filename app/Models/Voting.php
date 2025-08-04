<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'voting';
    protected $fillable = ['user_id', 'kandidat_id', 'pemilihan_id'];

    /**
     * Get the user that owns the voting.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the kandidat that is voted for.
     */
    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }
    /**
     * Get the pemilihan that this voting belongs to.
     */
    public function pemilihan()
    {
        return $this->belongsTo(Pemilihan::class);
    }
}
