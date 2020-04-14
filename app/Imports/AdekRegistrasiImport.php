<?php

namespace App\Imports;

use App\AdekRegistrasi;
use Maatwebsite\Excel\Concerns\ToModel;

class AdekRegistrasiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AdekRegistrasi([
          'dim_id'=> $row[0],
          'ta' => $row[1],
          'sem_ta' => $row[2],
          'nr' => $row[3],
          'status_akhir_registrasi' => $row[4],
        ]);
    }
}
