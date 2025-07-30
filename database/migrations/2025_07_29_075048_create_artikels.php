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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke user (pembuat artikel)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            
            // Konten berupa foto, disimpan sebagai nama file
            $table->string('konten')->nullable();

            // Enum kategori
            $table->enum('kategori', ['pre-event', 'event', 'post-event', 'artikel']);

            // Status artikel
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
