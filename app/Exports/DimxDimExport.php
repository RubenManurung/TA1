<?php

namespace App\Exports;

use App\DimxDim;
use Maatwebsite\Excel\Concerns\FromCollection;

class DimxDimExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DimxDim::all();
    }
}
