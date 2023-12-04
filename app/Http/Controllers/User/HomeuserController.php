<?php

namespace App\Http\Controllers\User;

use App\Models\Pengajuansampah;
use App\Models\Pengajuanpohon;
use App\Models\Pengajuanenergi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeuserController extends Controller
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

        return view('.User.Homeuser', compact('totalTanaman', 'totalSampah', 'totalRatio', 'totalOrganik', 'totalAnorganik', 'totalB3', 'totalKertas', 'totalResidu', 'totalLainnya',
        'totalKGOrganik', 'totalKGAnorganik', 'totalKGB3', 'totalKGKertas', 'totalKGResidu', 'totalKGLainnya', 'dataSampahFakultas', 'years'));

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

    
}
