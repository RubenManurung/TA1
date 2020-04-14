<?php

namespace App\Exports;

use App\DimPenilaian;
use Maatwebsite\Excel\Concerns\FromCollection;

class DimPenilaianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DimPenilaian::all();
    }
}
