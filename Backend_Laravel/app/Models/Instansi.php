<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class, 'instansi_id');
    }

    public function indikator()
    {
        return $this->hasMany(Indikator::class, 'id_instansi');
    }

    // Relasi ke tabel jurnal
    public function jurnal()
    {
        return $this->hasMany(Jurnal::class, 'id_instansi');
    }
}
