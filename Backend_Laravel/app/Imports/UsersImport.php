<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Instansi;
use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        // Mencari instansi dan jurusan berdasarkan nama
        $jurusan = Jurusan::where('nama_jurusan', $row['jurusan'])->first();
        $instansi = Instansi::where('instansi_name', $row['tempat_pkl'])->first();

        // Menambahkan user baru
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'username' => $row['username'],
            'password' => bcrypt($row['password']),
            'role' => $row['role'],
            'kelas' => $row['kelas'] ?? null,
            'jurusan_id' => $jurusan ? $jurusan->id : null,
            'nisn' => $row['nisn'] ?? null,
            'tempat_pkl' => $instansi ? $instansi->id : null,
            'nip' => $row['nip'] ?? null,
            'instansi_id' => $instansi ? $instansi->id : null,
            'foto_profile' => 'profile-img.jpg',
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string',
            'role' => 'required|in:admin,siswa,guru,instansi',
            'nisn' => 'nullable|unique:users,nisn',
            'tempat_pkl' => 'nullable',
            'jurusan' => 'nullable',
            'nip' => 'nullable|unique:users,nip',
            'foto_profile' => 'nullable|string',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'role.in' => 'Role harus salah satu dari: admin, siswa, guru, instansi.',
            'email.unique' => 'Email sudah terdaftar.',
            'username.unique' => 'Username sudah terdaftar.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'tempat_pkl.exists' => 'Instansi yang dipilih tidak valid.',
            'jurusan.exists' => 'Jurusan yang dipilih tidak valid.',
        ];
    }
}
