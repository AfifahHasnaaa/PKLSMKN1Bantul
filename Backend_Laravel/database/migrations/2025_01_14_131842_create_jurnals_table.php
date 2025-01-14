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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa'); // Relasi ke model User (siswa)
            $table->unsignedBigInteger('id_guru'); // Relasi ke model User (guru)
            $table->unsignedBigInteger('id_instansi'); // Relasi ke model Instansi
            $table->integer('durasi_magang'); // Dalam satuan jam/hari
            $table->string('posisi_magang'); // Posisi magang siswa
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_siswa')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_guru')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('id_pembimbing_instansi')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_instansi')->references('id')->on('instansis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
