<?php

namespace App\Exports;

use App\AdakRegistrasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdakRegistrasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AdakRegistrasi::all();
    }
}
