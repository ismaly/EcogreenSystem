<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengajuansampah;
use App\Models\Pengajuanpohon;
use App\Models\Pengajuanenergi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExportKegiatan;
use App\Exports\ExportDataKegiatan;
use PDF;
use Dompdf\Options;
use PDO;
use TCPDF;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\MessageBag;
use Spatie\Browsershot\Browsershot;

class HomeadminController extends Controller
{
    public function index(Request $request)
    {   
        $yearFilter = $request->input('year');

        // $totalTanaman = PengajuanPohon::where('status', 'Diterima')->count();
        $totalTanaman = PengajuanPohon::where('status', 'Diterima');
        if ($yearFilter) {
            $totalTanaman->whereYear('created_at', $yearFilter);
        }
        $totalTanaman = $totalTanaman->count();

        $totalSampah = Pengajuansampah::where('status', 'Diterima');
        if ($yearFilter) {
            $totalSampah->whereYear('created_at', $yearFilter);
        }
        $totalSampah = $totalSampah->sum('total');

        $totalOrganik = Pengajuansampah::where('jenis_sampah', 'Sampah Organik')->where('status', 'Diterima')->sum('total');
        $totalAnorganik = Pengajuansampah::where('jenis_sampah', 'Sampah Anorganik')->where('status', 'Diterima')->sum('total');
        $totalB3 = Pengajuansampah::where('jenis_sampah', 'Sampah Bahan Berbahaya dan Beracun (B3)')->where('status', 'Diterima')->sum('total');
        $totalKertas = Pengajuansampah::where('jenis_sampah', 'Sampah Kertas')->where('status', 'Diterima')->sum('total');
        $totalResidu = Pengajuansampah::where('jenis_sampah', 'Sampah Residu')->where('status', 'Diterima')->sum('total');
        $totalLainnya = Pengajuansampah::where('jenis_sampah', 'Lainnya')->where('status', 'Diterima')->sum('total');

        $totalKGOrganik = Pengajuansampah::where('jenis_sampah', 'Sampah Organik')->where('status', 'Diterima')->sum('total');
        $totalKGAnorganik = Pengajuansampah::where('jenis_sampah', 'Sampah Anorganik')->where('status', 'Diterima')->sum('total');
        $totalKGB3 = Pengajuansampah::where('jenis_sampah', 'Sampah Bahan Berbahaya dan Beracun (B3)')->where('status', 'Diterima')->sum('total');
        $totalKGKertas = Pengajuansampah::where('jenis_sampah', 'Sampah Kertas')->where('status', 'Diterima')->sum('total');
        $totalKGResidu = Pengajuansampah::where('jenis_sampah', 'Sampah Residu')->where('status', 'Diterima')->sum('total');
        $totalKGLainnya = Pengajuansampah::where('jenis_sampah', 'Lainnya')->where('status', 'Diterima')->sum('total');

        // $totalRatio = $this->calculateTotalRatio();
        $totalRatio = $this->calculateTotalRatio($yearFilter);

        $dataSampahFakultas = Pengajuansampah::where('status', 'Diterima')->get();

        $years = PengajuanPohon::getYears();
        $yearsenergi = Pengajuanenergi::getYears();

        
        return view('.Admin.Homeadmin', compact('totalTanaman', 'totalSampah', 'totalRatio', 'totalOrganik', 'totalAnorganik', 'totalB3', 'totalKertas', 'totalResidu', 'totalLainnya',
        'totalKGOrganik', 'totalKGAnorganik', 'totalKGB3', 'totalKGKertas', 'totalKGResidu', 'totalKGLainnya', 'dataSampahFakultas', 'years', 'yearsenergi'));

    }

    public function calculateTotalRatio($yearFilter)
    {
        $query = Pengajuanenergi::query();

        if ($yearFilter) {
            $year = (int)$yearFilter;

            // Filter by year in 'tanggal' field
            $query->whereRaw("YEAR(STR_TO_DATE(tanggal, '%Y-%m-%d')) = $year");
        }

        $currentMonth = date('m');
        if ($yearFilter && date('Y') === $yearFilter) {
            $query->whereMonth('tanggal', '<=', $currentMonth); // Only include months up to the current month if the current year is selected
        }

        $totalRatio = $query->sum('ratio');

        return $totalRatio;
    }

    public function exportDataKegiatan()
    {
        return Excel::download(new DataExportKegiatan(), 'Data Kegiatan Ecogreen.xlsx');
    }

    public function generatePdf()
    {
        // Menambahkan ini untuk menangani timeout dalam Laravel
        set_time_limit(0); // 0 artinya tidak ada timeout
    
        // Sisanya tetap sama
        Browsershot::url('http://localhost:8000/Homeadmin')
        ->setNodeBinary('C:\Progra~1\nodejs\node.exe')
        ->setOption('headless', 'new')
        ->setOption('tempDir', 'C:\path\to\existing\temp\directory')
        ->save('example.pdf');

    }

    // public function exportChartToPdf()
    // {
    //     // Inisialisasi Puppeteer
    //     $browser = \Puppeteer\launch();

    //     // Buka halaman dengan grafik
    //     $page = $browser->newPage();
    //     $page->goto('http://localhost:8000/Homeadmin'); // Gantilah dengan URL halaman Anda

    //     // Tunggu beberapa detik (opsional)
    //     // $page->waitForTimeout(2000); // Misalnya, tunggu 2 detik

    //     // Tentukan elemen yang berisi grafik Highcharts (ganti sesuai dengan ID atau selector yang sesuai)
    //     $chartElement = $page->querySelector('#total_penanaman');

    //     // Ambil tangkapan layar elemen grafik dan simpan sebagai PDF
    //     $chartElement->screenshot(['path' => 'chart.pdf']);

    //     // Tutup browser
    //     $browser->close();

    //     // Kembalikan file PDF (jika Anda ingin menampilkan tautan unduhan)
    //     return response()->download('chart.pdf')->deleteFileAfterSend(true);
    // }

    
}

