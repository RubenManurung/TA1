<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    protected $table = "nilai_alternatif";
    protected $hidden       = ['created_at','updated_at'];
 
    public function nilai_kriteria() {
        return $this->belongsTo(\App\NilaiKriteria::class,'nilai_kriteria_id');
    }
    public function mahasiswa() {
        return $this->belongsTo(\App\Mahasiswa::class,'alternatif_id');
    }
}

