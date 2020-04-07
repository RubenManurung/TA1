<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKKM extends Model
{
    protected $table = "skkm";
    protected $fillable     = ['dim_id','skkm'];
    public $timestamps = false;
}
