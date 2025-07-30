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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();

            // Relasi ke kegiatan_absensi
            $table->foreignId('kegiatan_id')->constrained('kegiatan_absensi')->onDelete('cascade');

            // Contoh data absensi
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // siapa yang hadir
            $table->enum('status', ['hadir', 'tidak_hadir', 'izin'])->default('tidak_hadir'); // status kehadiran
            $table->text('keterangan')->nullable(); // keterangan tambahan jika ada

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
