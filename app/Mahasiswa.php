<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table        = 'mahasiswa';
    protected $fillable     = ['kode','nama','keterangan'];
    protected $hidden       = ['created_at','updated_at'];

    public function nilai_kriteria()
    {
        return $this->belongsToMany(\App\NilaiKriteria::class,'nilai_alternatif','alternatif_id','nilai_kriteria_id');
    }
}
