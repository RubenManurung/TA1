<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilSAW extends Model
{
     protected $table        = 'hasil_saw';
    protected $fillable     = ['total'];
    protected $hidden       = ['created_at','updated_at'];
}
