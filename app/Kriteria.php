<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table        = 'kriteria';
    protected $fillable     = ['kode','kriteria','atribut','bobot','keterangan'];
    protected $hidden       = ['created_at','updated_at'];
    public function crip() {
        return $this->hasMany(\App\Crip::class);
    }
}
