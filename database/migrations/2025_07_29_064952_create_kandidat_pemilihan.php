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
        Schema::create('kandidat', function (Blueprint $table) {
            $table->id();
            // Relasi ke pengurus untuk ketua dan wakil
            $table->foreignId('kandidat_ketua_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kandidat_wakil_id')->nullable()->constrained('users')->onDelete('cascade');
            // Relasi ke pemilihan
            $table->foreignId('pemilihan_id')->constrained('pemilihan')->onDelete('cascade');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->integer('no_urut')->nullable();
            $table->string('poster')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidat_pemilihan');
    }
};
