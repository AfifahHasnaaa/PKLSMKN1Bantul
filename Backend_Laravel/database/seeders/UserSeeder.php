<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Role
        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'siswa']);
        $teacherRole = Role::create(['name' => 'guru']);
        $instansiRole = Role::create(['name' => 'instansi']);

        // Buat User Admin
        $admin = User::create([
            'name' => 'Admin SMK',
            'email' => 'admin@example.com',
            'username' => 'adminsmk',
            'password' => Hash::make('password'), // Ganti dengan password aman
            'role' => 'admin',
            'foto_profile' => 'profile-img.jpg',
        ]);
        $admin->assignRole($adminRole);

        // Buat User Siswa
        $student = User::create([
            'name' => 'Siswa SMK',
            'email' => 'siswa@example.com',
            'username' => 'siswasmk',
            'password' => Hash::make('password'), // Ganti dengan password aman
            'role' => 'siswa',
            'kelas' => 'XII RPL 1',
            'jurusan_id' => 1, // Ganti dengan ID jurusan yang sesuai
            'nisn' => '1234567890',
            'foto_profile' => 'profile-img.jpg',
        ]);
        $student->assignRole($studentRole);

        // Buat User Guru
        $teacher = User::create([
            'name' => 'Guru SMK',
            'email' => 'guru@example.com',
            'username' => 'gurusmk',
            'password' => Hash::make('password'), // Ganti dengan password aman
            'role' => 'guru',
            'nip' => '1987654321',
            'foto_profile' => 'profile-img.jpg',
        ]);
        $teacher->assignRole($teacherRole);

        // Buat User Instansi
        $instansi = User::create([
            'name' => 'Instansi PKL',
            'email' => 'instansi@example.com',
            'username' => 'instansipkl',
            'password' => Hash::make('password'), // Ganti dengan password aman
            'role' => 'instansi',
            'instansi_name' => 'PT Contoh Sukses',
            'instansi_address' => 'Jl. Contoh No. 123',
            'instansi_contact' => '08123456789',
            'foto_profile' => 'profile-img.jpg',
        ]);
        $instansi->assignRole($instansiRole);

        $this->command->info('Roles dan Users berhasil dibuat!');
    }
}
