<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKKM extends Model
{
    protected $table = "skkm";
    protected $fillable     = ['skkm','keterangan'];
    public $timestamps = false;
}
