<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimxDim extends Model
{
    protected $table = "dimx_dim";

    public function skkm()
    {
        return $this->hasMany(SKKM::class);
    }
}
