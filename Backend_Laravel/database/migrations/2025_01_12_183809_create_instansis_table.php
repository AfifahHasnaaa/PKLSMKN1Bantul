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
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            // Kolom tambahan untuk instansi
            $table->string('instansi_name')->nullable()->comment('Nama Instansi PKL');
            $table->string('instansi_address')->nullable()->comment('Alamat Instansi PKL');
            $table->string('instansi_contact')->nullable()->comment('Kontak Instansi PKL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansis');
    }
};
