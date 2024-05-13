<?php

namespace App\Exports;

use App\Models\KeterlambatanGurus;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeterlambatanGurusExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KeterlambatanGurus::all();
    }
}
