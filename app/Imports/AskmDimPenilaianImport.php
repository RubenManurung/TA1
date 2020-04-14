<?php

namespace App\Imports;

use App\DimPenilaian;
use Maatwebsite\Excel\Concerns\ToModel;

class AskmDimPenilaianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DimPenilaian([
          'dim_id'=> $row[0],
          'ta' => $row[1],
          'sem_ta' => $row[2],
          'akumulasi_skor' => $row[3],
        ]);
    }
}
