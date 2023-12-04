<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExportEnergi;
use App\Models\Pengajuanenergi;

class EnergiController extends Controller
{
    //energi
    public function DataEnergi(Request $request)
    {
        // Ambil tahun-tahun unik dari kolom "tanggal" pada tabel dan urutkan secara ascending
        $years = Pengajuanenergi::selectRaw('YEAR(tanggal) as year')
                                ->distinct()
                                ->orderBy('year', 'asc')
                                ->pluck('year');

        // Mengambil inputan tahun dari filter
        $selectedYear = $request->input('year');

        // Menggunakan metode when() untuk mengatur filter tahun jika dipilih
        $dataenergi = Pengajuanenergi::when($selectedYear, function ($query, $year) {
            return $query->whereYear('tanggal', $year);
        })
        ->orderBy('created_at', 'desc')
        ->get();

        return view('Admin.Data_kegiatan.data_energi', compact('dataenergi', 'years', 'selectedYear'));
    }


    public function TambahDataEnergi(Request $request)
    {
        $kampus = $request->input('kampus');
        $tanggal = $request->input('tanggal');
        $totalEnergiListrik = $request->input('totalEnergiListrik');
        $totalEnergiTerbarukan = $request->input('totalEnergiTerbarukan');

        // Hitung rasio totalEnergiTerbarukan dibagi totalEnergiListrik
        $ratio = $this->calculateRatio($totalEnergiTerbarukan, $totalEnergiListrik);

        // Simpan data ke database
        Pengajuanenergi::create([
            'kampus' => $kampus,
            'tanggal' => $tanggal,
            'totalEnergiListrik' => $totalEnergiListrik,
            'totalEnergiTerbarukan' => $totalEnergiTerbarukan,
            'ratio' => $ratio, // Tambahkan rasio ke dalam array data
        ]);
        return redirect()->route('DataEnergi')->with('success', 'Data berhasil ditambahkan');
    }

    public function calculateRatio($totalEnergiTerbarukan, $totalEnergiListrik)
    {
        if ($totalEnergiListrik != 0) {
            $ratio = $totalEnergiTerbarukan / $totalEnergiListrik;
        } else {
            $ratio = 0;
        }

        return $ratio;
    }

    public function DataEnergiUpdate(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'kampus' => 'required',
            'tanggal' => 'required',
            'totalEnergiListrik' => 'required',
            'totalEnergiTerbarukan' => 'required',
        ]);

        // Hitung ratio
        $totalEnergiListrik = $request->totalEnergiListrik;
        $totalEnergiTerbarukan = $request->totalEnergiTerbarukan;
        $ratio = $totalEnergiTerbarukan / $totalEnergiListrik;

        // Update data ke database
        Pengajuanenergi::where('id', $id)->update([
            'kampus' => $request->kampus,
            'tanggal' => $request->tanggal,
            'totalEnergiListrik' => $totalEnergiListrik,
            'totalEnergiTerbarukan' => $totalEnergiTerbarukan,
            'ratio' => $ratio,
        ]);
        
        // Redirect atau berikan respon sesuai kebutuhan
        return redirect()->route('DataEnergi')->withErrors($validatedData)->with('success', 'Data berhasil diubah');
    }


    public function DataEnergiDelete($id)
    {
        $dataenergidelete = Pengajuanenergi::find($id);
        $dataenergidelete->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $dataenergidelete);
    }

    public function exportDataEnergi(Request $request)
    {
        $selectedYear = $request->input('year');
    
        // Generate the filename with the selected year (if applicable)
        $filename = 'Laporan Data Pemeliharaan dan Penggunaan Energi';
        if ($selectedYear) {
            $filename .= '_' . $selectedYear;
        }
        $filename .= '.xlsx';
    
        // Export the data using the DataExportEnergi class with the selected year
        return Excel::download(new DataExportEnergi($selectedYear), $filename);
    }
}
