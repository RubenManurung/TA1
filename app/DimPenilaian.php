<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimPenilaian extends Model
{
    protected $table = "askm_dim_penilaian";
    protected $fillable = ['dim_id','ta','sem_ta','akumulasi_skor'];
    public $timestamps = false;
}
