<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKKM extends Model
{
    protected $table = "skkm";
    protected $fillable     = ['id_mhs','skkm'];
    public $timestamps = false;

    public function dimx() {
        return $this->belongsTo(DimxDim::class);
    }
}
