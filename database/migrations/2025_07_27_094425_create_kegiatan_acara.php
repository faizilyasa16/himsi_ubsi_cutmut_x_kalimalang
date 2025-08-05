<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_acara')->onDelete('cascade');
            $table->string('nama', 200);
            $table->string('deskripsi', 200)->nullable();
            $table->string('lokasi', 100);
            $table->string('contact_person', 100)->nullable();
            $table->string('poster', 100)->nullable(); // boleh kosong
            $table->string('kuota', 10)->nullable();
            $table->enum('status', ['draft', 'open', 'closed'])->default('draft');
            $table->string('slug', 200)->unique();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai')->nullable();
            $table->string('link_pendaftaran', 200)->nullable();
            $table->string('link_wa', 200)->nullable();
            $table->string('biaya', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('payment_number', 100)->nullable();
            $table->string('payment_name', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('acara');
    }
};
