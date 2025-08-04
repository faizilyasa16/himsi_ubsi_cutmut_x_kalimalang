<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voting', function (Blueprint $table) {
            $table->id();

            // Relasi ke user yang melakukan voting
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Relasi ke kandidat yang dipilih
            $table->foreignId('kandidat_id')->constrained('kandidat')->onDelete('cascade');

            // Relasi ke pemilihan
            $table->foreignId('pemilihan_id')->constrained('pemilihan')->onDelete('cascade');

            $table->timestamps();

            // Supaya 1 user hanya bisa vote 1 kali per pemilihan
            $table->unique(['user_id', 'pemilihan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting');
    }
};
