<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relasi ke model User (siswa)
    public function siswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    // Relasi ke model User (guru)
    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru');
    }

    // // Relasi ke model User (pembimbing instansi)
    // public function pembimbingInstansi()
    // {
    //     return $this->belongsTo(User::class, 'id_pembimbing_instansi');
    // }

    // Relasi ke model Instansi
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

     // Relasi ke tabel indikator
    public function indikator()
    {
        return $this->hasMany(Indikator::class, 'id_jurnal');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'jurnal_id');
    }
}
