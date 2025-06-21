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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // Judul file
            $table->text('content');         // Konten atau deskripsi file
            $table->string('author')->nullable();  // Penulis file
            $table->string('topic')->nullable();   // Topik file
            $table->year('published_year')->nullable(); // Tahun penerbitan
            $table->timestamps();            // Tanggal dan waktu dibuat/diperbarui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
