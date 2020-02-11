<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table        = 'mahasiswa';
    protected $fillable     = ['kode','nama','ipk','nilaiperilaku'];
    protected $hidden       = ['created_at','updated_at'];

    // public function crip()
    // {
    //     return $this->belongsToMany(\App\Crip::class,'nilai_alternatif','alternatif_id','crip_id');
    // }
}
