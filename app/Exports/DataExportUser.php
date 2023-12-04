<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class DataExportUser implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NIM/NIP/NIDN',
            'Pekerjaan',
            'Fakultas',
            'Email',
            '',
            'Password',
            'Role',
            '',
            'Created',
            'Updated',
        ];
    }
}
