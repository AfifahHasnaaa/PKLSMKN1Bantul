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
        Schema::create('indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('users')->onDelete('cascade'); // Relasi ke model User
            $table->foreignId('id_instansi')->constrained('instansis')->onDelete('cascade'); // Relasi ke model Instansi
            $table->foreignId('id_jurnal')->constrained('jurnals')->onDelete('cascade'); // Relasi ke model Jurnal
            $table->string('indikator')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('skor')->nullable();
            $table->enum('status', ['sudah', 'belum'])->nullable();
            $table->date('tanggal_submit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikators');
    }
};
