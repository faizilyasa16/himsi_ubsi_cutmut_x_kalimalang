<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JoinHimsi;
class JoinHimsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JoinHimsi::create([
            'link' => 'https://oprechimsi.com/'
        ]);
    }
}
