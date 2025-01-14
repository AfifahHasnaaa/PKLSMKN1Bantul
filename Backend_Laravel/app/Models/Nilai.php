<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }
}
