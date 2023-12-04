<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Pengajuanenergi;

class DataExportEnergi implements FromCollection, WithHeadings
{
    protected $selectedYear;

    public function __construct()
    {
    }

    public function collection()
    {
        // Filter data based on the selected year (if applicable)
        $query = Pengajuanenergi::query();
        if ($this->selectedYear) {
            $query->whereYear('tanggal', $this->selectedYear);
        }
        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Lokasi',
            'Tanggal',
            'Total Penggunaan Energi Non Terbarukan /Bulan',
            'Total Pemasukan Energi Terbarukan /Bulan',
            'Ratio',
            'Created',
            'Updated',
        ];
    }
}
