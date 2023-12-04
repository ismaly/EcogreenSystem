<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengajuansampah;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExportSampah;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DataSampahUpdateNotification;
use PDF;

class SampahController extends Controller
{
   //waste
   public function sampah(Request $request)
   {   
       // Ambil tahun-tahun unik dari tabel dan urutkan secara ascending
       $years = Pengajuansampah::selectRaw('YEAR(created_at) as year')
                           ->distinct()
                           ->orderBy('year', 'asc')
                           ->pluck('year');

       $selectedYear = $request->input('year');
       // Menggunakan metode when() untuk mengatur filter tahun jika dipilih
       $datasampahuser = Pengajuansampah::when($selectedYear, function ($query, $year) {
           return $query->whereYear('created_at', $year);
       })
       ->orderBy('updated_at', 'desc')
       ->orderBy('created_at', 'desc')
       ->get();

        $user = auth()->user();
        $user->unreadNotifications->markAsRead();

       return view('Admin.Data_kegiatan.data_sampah', compact('datasampahuser', 'years', 'selectedYear'));
   }

   public function DataSampahUpdate(Request $request, $id)
   {       
       // Validasi input jika diperlukan
       $validatedData = $request->validate([
           'nama' => 'required',
           'nim' => 'required',
           'nohp' => 'required',
           'pekerjaan' => 'required',
           'fakultas' => 'required',
           'jenis_sampah' => 'required',
           'total' => 'required',
           'formFile' => 'nullable|mimes:jpeg,jpg,png|max:3048',
           'keterangan' => 'required',
           'status' => 'required|in:Diterima,Ditolak', // Nilai harus 'Acc' atau 'Ditolak'
       ]);
        
       // Check if a new formFile is uploaded
       if ($request->hasFile('formFile')) {
           $file = $request->file('formFile');
           // Validasi apakah file adalah gambar
           if (!$file->isValid()) {
               return redirect()->route('DataSampah')->withErrors(['formFile' => 'File yang diupload bukan gambar'])->withInput();
           }
           $fileName = time() . '_' . $file->getClientOriginalName();
           $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
           
           // Delete the old formFile if it exists
           if ($request->formFile) {
               Storage::delete('public/images/' . $request->formFile);
           }

           $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
       } else { 
            $pengajuansampahupdate= Pengajuansampah::findOrFail($id);
            $gambar = $pengajuansampahupdate->formFile;
       }
        
           Pengajuansampah::where('id', $id)->update([
               'nama' => $request->nama,
               'nim' => $request->nim,
               'nohp' => $request->nohp,
               'fakultas' => $request->fakultas,
               'pekerjaan' => $request->pekerjaan,
               'jenis_sampah' => $request->jenis_sampah,
               'total' => $request->total,
               'formFile' => $gambar,
               'keterangan' => $request->keterangan,
               'status' => $request->status,
               // tambahkan bidang lain yang ingin diperbarui di sini
           ]);
        // $pengajuansampahupdate->update($validatedData);

        $pengajuan= Pengajuansampah::findOrFail($id);

        // Buat notifikasi untuk update data pengajuan pohon
        $notificationInstance = new DataSampahUpdateNotification($pengajuan, $id);
        // $user = User::whereIn('role', ['user'])->get();
        // $user = $pengajuan->user;
        $user = User::find($pengajuan->user_id);

        Notification::send($user, $notificationInstance);
        
        // return redirect()->route('DataSampah')->with('success', 'Data berhasil diubah');
        return redirect()->back()->with('success', 'Data berhasil diubah')->with('data', $pengajuan);
   }

   public function DataSampahUpdateStatus(Request $request, $id)
   {
       $validatedData = $request->validate([
           'status' => 'required',
           'keterangan' => 'nullable',
       ]);

       $pengajuan = Pengajuansampah::findOrFail($id);
       $pengajuan->update($validatedData);

       $notificationInstance = new DataSampahUpdateNotification($pengajuan, $id);
        // Ambil semua pengguna dengan peran 'user'
        // $user = User::whereIn('role', ['user'])->get();
        // $user = $pengajuan->user;
        $user = User::find($pengajuan->user_id);

        // Kirim notifikasi kepada semua pengguna 'user'
        Notification::send($user, $notificationInstance);
        // return redirect()->route('DataSampah')->with('success', 'Data berhasil diubah');
        return redirect()->back()->with('success', 'status berhasil diupdate')->with('data', $pengajuan);
   }
   
   public function DataSampahDelete($id)
   {
       $datasampahdelete = Pengajuansampah::find($id); // Mengambil data berdasarkan ID
        // unlink('public/images/' . $datasampahdelete->formFile);
       $datasampahdelete->delete(); // Menghapus data
       

       return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $datasampahdelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
   }

   public function exportDatasampahuser(Request $request)
   {
       $yearFilter = $request->input('year'); // Ambil tahun dari input request

       // Filter data berdasarkan tahun yang dipilih
       $datasampahuser = Pengajuansampah::query();
       if ($yearFilter) {
           $datasampahuser->whereYear('created_at', $yearFilter);
       }
       
       $filename = 'datasampahuser';
       if ($yearFilter) {
           $filename .= '_'.$yearFilter; // Tambahkan tahun ke dalam nama file jika ada filter tahun
       }
       $filename .= '.xlsx';

       return Excel::download(new DataExportSampah($datasampahuser), $filename);
   }

   public function exportDataSampahpdf()
    {
        $datasampahuser = Pengajuansampah::all();
        $pdf = PDF::loadView('Admin.Data_kegiatan.datasampah-pdf', compact('datasampahuser'));
        $pdf->setPaper('A3', 'landscape');
        return $pdf->stream('datasampah.pdf');
    }
}
