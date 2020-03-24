<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
  


    protected $table = 'kriteria';
    protected $fillable     = ['kode','nama','atribut','bobot','keterangan'];
    public $timestamps = false;

}

 