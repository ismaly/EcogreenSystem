<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Pengajuansampah;
use Illuminate\Database\Eloquent\Builder; // Import Builder
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class DataExportSampah implements FromCollection, WithHeadings
{
    protected $datasampah;
    

    public function __construct()
    {
    }

    public function collection()
    {
        $this->datasampah = Pengajuansampah::query() // Atau cara lain untuk mendapatkan data
        ->orderBy('updated_at', 'desc')
        ->orderBy('created_at', 'desc')
        ->get();

        return $this->datasampah;
    }

    public function headings(): array
    {
        return [
            'No',
            'User_id',
            'Nama',
            'NIM/NIP/NIDN',
            'No Hp',
            'Pekerjaan',
            'Fakultas',
            'Jenis Sampah',
            'Sampah Terkumpul (KG)',
            'Bukti Pengumpulan',
            'Created',
            'Updated',
            'Keterangan',
            'Status',
        ];
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             $dataRows = $this->datasampah->toArray();

    //             foreach ($dataRows as $index => $rowData) {
    //                 if ($index === 0) {
    //                     continue; // Skip the header row
    //                 }

    //                 $imagePath = $rowData['formFile']; // Assuming 'bukti_pengumpulan' is the field containing the image path

    //                 $drawing = new Drawing();
    //                 $drawing->setName('Bukti Pengumpulan');
    //                 $drawing->setDescription('Gambar');
    //                 $drawing->setPath(public_path($imagePath));
    //                 $drawing->setHeight(80);
    //                 $drawing->setCoordinates('J' . ($index + 2));

    //                 $event->sheet->getRowDimension($index + 2)->setRowHeight(80);
    //                 $event->sheet->getDelegate()->getActiveSheet()->addDrawing($drawing);
    //             }
    //         },
    //     ];
    // }
}
