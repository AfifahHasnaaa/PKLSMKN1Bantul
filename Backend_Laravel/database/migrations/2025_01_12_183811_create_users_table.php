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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique(); // Jika dibutuhkan username
            $table->string('password');
            $table->enum('role', ['admin','siswa', 'guru', 'instansi'])->index();
            
            // Kolom tambahan untuk siswa
            $table->string('kelas')->nullable()->comment('Kelas siswa');
            // Relasi ke tabel jurusan
            $table->unsignedBigInteger('jurusan_id')->nullable()->comment('Relasi ke tabel jurusan');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('set null');
            $table->string('nisn')->unique()->nullable()->comment('Nomor Induk Siswa Nasional');
            
            // Kolom tambahan untuk guru
            $table->string('nip')->unique()->nullable()->comment('Nomor Induk Pegawai');
            // $table->string('mapel')->nullable()->comment('Mata pelajaran yang diajarkan');

            // Kolom tambahan untuk instansi
            $table->string('instansi_name')->nullable()->comment('Nama Instansi PKL');
            $table->string('instansi_address')->nullable()->comment('Alamat Instansi PKL');
            $table->string('instansi_contact')->nullable()->comment('Kontak Instansi PKL');
            $table->string('foto_profile')->nullable()->comment('Foto Profile');
            
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
