<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

     /**
     * Relasi ke model User sebagai siswa.
     */
    public function siswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    /**
     * Relasi ke model Instansi.
     */
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    /**
     * Relasi ke model Jurnal.
     */
    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'id_jurnal');
    }
    
}
