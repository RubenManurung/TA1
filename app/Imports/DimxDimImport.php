<?php

namespace App\Imports;

use App\DimxDim;
use Maatwebsite\Excel\Concerns\ToModel;

class DimxDimImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DimxDim([
            'dim_id' => $row[0],
            'nim' => $row[1],
            'nama' => $row[2],
            'thn_masuk' => $row[3],
            'dari_jlh_anak' => $row[4],
            'penghasilan_ayah' => $row[5],
            'penghasilan_ayah_id' => $row[6],
            'penghasilan_ibu' => $row[7],
            'penghasilan_ibu_id' => $row[8],
            'pekerjaan_ayah_id' => $row[9],
            'keterangan_pekerjaan_ayah' => $row[10],
            'pekerjaan_ibu_id' => $row[11],
            'keterangan_pekerjaan_ibu' => $row[12],
        ]);
    }
}
