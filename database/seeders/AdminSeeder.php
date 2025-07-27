<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nim' => '0000000001',
            'name' => 'Admin HIMSI',
            'email' => 'admin@himsi.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'photo' => null,
            'divisi' => null,
            'peringatan' => null,
            'remember_token' => Str::random(10),
        ]);
    }
}
