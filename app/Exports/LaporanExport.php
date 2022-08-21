<?php

namespace App\Exports;

// use App\Models\checkin;

use App\Models\CheckIn;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CheckIn::all();
    }
}
