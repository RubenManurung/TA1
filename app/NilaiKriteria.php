<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    protected $table        = 'nilai_kriteria';
    protected $fillable     = ['nama','nilai'];
    protected $hidden       = ['created_at','updated_at'];
    public function kriteria() {
        return $this->belongsTo(\App\Kriteria::class,'kriteria_id');
    }
    public function nilai() {
        return $this->belongsTo(\App\NilaiAlternatif::class);
    }
}