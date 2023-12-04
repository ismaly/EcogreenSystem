<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DataExportKegiatan implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        return [
            'Users' => new DataExportUser(),
            'Sampah' => new DataExportSampah(),
            'Energi' => new DataExportEnergi(),
            'Pohon' => new DataExportPohon(),
        ];
    }
}
