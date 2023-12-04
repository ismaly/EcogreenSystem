<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengajuanpohon;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExportPohon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DataTanamanUpdateNotification;
use PDF;

class TanamanController extends Controller
{
    //pohon
    public function pohon(Request $request)
    {   
        // Ambil tahun-tahun unik dari tabel dan urutkan secara ascending
        $years = Pengajuanpohon::selectRaw('YEAR(created_at) as year')
                               ->distinct()
                               ->orderBy('year', 'asc')
                               ->pluck('year');
    
        $selectedYear = $request->input('year');
        // Menggunakan metode when() untuk mengatur filter tahun jika dipilih
        $datapohonuser = Pengajuanpohon::when($selectedYear, function ($query, $year) {
            return $query->whereYear('created_at', $year);
        })
        ->orderBy('updated_at', 'desc')
        ->orderBy('created_at', 'desc')
        ->get();

        $user = auth()->user();
        $user->unreadNotifications->markAsRead();

        return view('Admin.Data_kegiatan.data_pohon', compact('datapohonuser', 'years', 'selectedYear'));
    }
    

    public function DataPohonUpdate(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'nohp' => 'required',
            'pekerjaan' => 'required',
            'fakultas' => 'required',
            'jenistanaman' => 'required',
            'tinggitanaman' => 'required|numeric',
            'jumlahtanaman' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required',
            'formFile' => 'nullable|mimes:jpeg,jpg,png|max:3048',
            'keterangan' => 'required',
            'status' => 'required|in:Diterima,Ditolak', 
        ]);

        // Check if a new formFile is uploaded
        if ($request->hasFile('formFile')) {
            $file = $request->file('formFile');
            // Validasi apakah file adalah gambar
            if (!$file->isValid()) {
                return redirect()->route('DataPohon')->withErrors(['formFile' => 'File yang diupload bukan gambar'])->withInput();
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
            
            // Delete the old formFile if it exists
            if ($request->formFile) {
                Storage::delete('public/images/' . $request->formFile);
            }

            $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
        } else {
            $pengajuanPohon = PengajuanPohon::findOrFail($id);
            $gambar = $pengajuanPohon->formFile;
        }

        // Lakukan pembaruan pada data pengajuan pohon
        Pengajuanpohon::where('id', $id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'nohp' => $request->nohp,
            'fakultas' => $request->fakultas,
            'pekerjaan' => $request->pekerjaan,
            'jenistanaman' => $request->jenistanaman,
            'tinggitanaman' => $request->tinggitanaman,
            'jumlahtanaman' => $request->jumlahtanaman,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'formFile' => $gambar,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            // tambahkan bidang lain yang ingin diperbarui di sini
        ]);

        // Ambil data pengajuan yang telah diperbarui dari database
        $pengajuan = Pengajuanpohon::findOrFail($id); // Ganti Pengajuanpohon dengan model yang sesuai

        // Buat notifikasi untuk update data pengajuan pohon
        $notificationInstance = new DataTanamanUpdateNotification($pengajuan, $id);
        // $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();

        $user = $pengajuan->user;

        Notification::send($user, $notificationInstance);

        return redirect()->route('DataPohon')->with('success', 'Data berhasil diubah');

    }

    public function DataPohonUpdateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $pengajuan = Pengajuanpohon::findOrFail($id);
        $pengajuan->update($validatedData);
        
        // Buat notifikasi untuk update data pengajuan pohon
        $notificationInstance = new DataTanamanUpdateNotification($pengajuan, $id);
        // $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();

        $user = $pengajuan->user;

        Notification::send($user, $notificationInstance);

        return redirect()->route('DataPohon')->with('success', 'Data berhasil diubah');

    }

    public function DataPohonDelete($id)
    {
        $datapohondelete = Pengajuanpohon::find($id); // Mengambil data berdasarkan ID
        // unlink('public/images/' . $datapohondelete->formFile);
        $datapohondelete->delete(); // Menghapus data

        return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $datapohondelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
    }
    
    public function exportDatapohonuser(Request $request)
    {
        $yearFilter = $request->input('year'); // Ambil tahun dari input request

        // Filter data berdasarkan tahun yang dipilih
        $datapohonuser = Pengajuanpohon::query();
        if ($yearFilter) {
            $datapohonuser->whereYear('created_at', $yearFilter);
        }

        $filename = 'Laporan Data penanaman';
        if ($yearFilter) {
            $filename .= '_' . $yearFilter; // Tambahkan tahun ke dalam nama file jika ada filter tahun
        }
        $filename .= '.xlsx';

        return Excel::download(new DataExportPohon($datapohonuser), $filename);
    }

    public function exportDataPohonpdf()
    {
        $datapohonuser = Pengajuanpohon::all();
        $pdf = PDF::loadView('Admin.Data_kegiatan.datapohon-pdf', compact('datapohonuser'));
        $pdf->setPaper('A2', 'landscape');
        return $pdf->stream('datapohon.pdf');
    }

}
