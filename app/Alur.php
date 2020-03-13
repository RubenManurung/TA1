<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alur extends Model
{
    protected $table        = 'alurs';
    protected $fillable     = ['kode','nama','total','skkm'];
    protected $hidden       = ['created_at','updated_at'];


}
