<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data contoh
        Instansi::create([
            'instansi_name' => 'Instansi ABC',
            'instansi_address' => 'Jl. Raya No. 123, Jakarta',
            'instansi_contact' => '021-1234567',
        ]);

        Instansi::create([
            'instansi_name' => 'Instansi XYZ',
            'instansi_address' => 'Jl. Merdeka No. 456, Bandung',
            'instansi_contact' => '022-7654321',
        ]);
    }
}
