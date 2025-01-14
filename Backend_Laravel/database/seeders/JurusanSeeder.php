<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusans')->insert([
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
            'kode_jurusan' => 'TKJ',
            'durasi_belajar' => 3,
            'deskripsi' => 'Jurusan yang mempelajari tentang komputer, jaringan, dan teknologi informasi.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('Jurusan TKJ berhasil ditambahkan.');
    }
}
