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
        Schema::create('kegiatan_absensi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->dateTime('waktu');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->enum('status', ['draft','open', 'closed'])->default('draft');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_absensi');
    }
};
