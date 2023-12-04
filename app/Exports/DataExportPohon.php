<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Pengajuanpohon;
use Illuminate\Database\Eloquent\Builder; // Import Builder

class DataExportPohon implements FromCollection, WithHeadings
{
   protected $datapohonuser;

    public function __construct()
    {
       
    }
    public function collection()
    {
        $this->datapohonuser = Pengajuanpohon::query()
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = $this->datapohonuser->map(function ($item) {
            return [
                'No' => $item->id,
                'User_id' => $item->user_id,
                'Nama' => $item->nama,
                'NIM/NIP/NIDN' => $item->nim,
                'No Hp' => $item->nohp,
                'Pekerjaan' => $item->pekerjaan,
                'Fakultas' => $item->fakultas,
                'Jenis Bibit Tanaman' => $item->jenistanaman,
                'Jumlah Tanaman' => $item->jumlahtanaman,
                'Tinggi Bibit Tanaman (cm)' => $item->tinggitanaman,
                'Latitude' => $item->latitude,
                'Longitude' => $item->longitude,
                'Bukti Pengumpulan' => $item->formFile, // Kolom gambar
                'Created' => $item->created_at,
                'Updated' => $item->updated_at,
                'Keterangan' => $item->keterangan,
                'Status' => $item->status,
            ];
        });

        return $data;
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
            'Jenis Bibit Tanaman',
            'Jumlah Tanaman',
            'Tinggi Bibit Tanaman (cm)',
            'Latitude',
            'Longitude',
            'Bukti Pengumpulan',
            'Created',
            'Updated',
            'Keterangan',
            'Status',
        ];
    }
}
