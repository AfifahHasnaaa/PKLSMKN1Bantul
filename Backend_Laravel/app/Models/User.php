<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }

    public function tempatPkl()
    {
        return $this->belongsTo(Instansi::class, 'tempat_pkl');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'jurnal_id');
    }

    /**
     * Relasi ke jurnal sebagai siswa.
     */
    public function jurnalSiswa()
    {
        return $this->hasMany(Jurnal::class, 'id_siswa');
    }

    /**
     * Relasi ke jurnal sebagai guru.
     */
    public function jurnalGuru()
    {
        return $this->hasMany(Jurnal::class, 'id_guru');
    }

    /**
     * Relasi ke jurnal sebagai pembimbing instansi.
     */
    // public function jurnalPembimbingInstansi()
    // {
    //     return $this->hasMany(Jurnal::class, 'id_pembimbing_instansi');
    // }

    // Tambahkan relasi ke tabel indikator sebagai siswa
    public function indikatorSiswa()
    {
        return $this->hasMany(Indikator::class, 'id_siswa');
    }

}
