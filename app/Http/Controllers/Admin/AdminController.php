<?php

namespace App\Models;
namespace App\Http\Controllers\Admin;
use App\Models\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengajuanpohon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExportUser;
use App\Models\Pengajuansampah;
use Illuminate\Auth\Events\Registered;
use PDF;

class AdminController extends Controller
{   
    
     //user
     public function DataUser()
     {
         $datauser = User::all();
         return view('Admin.Data_kegiatan.data_user', ['datauser' => $datauser]);
     }
 
 
     public function TambahDataUser(Request $request)
     {
        $validatedData= $request->validate([
            'nama' => 'required|max:255',
            'nim' => 'required|max:255|unique:users',
            'nohp' => 'required|min:10 max:12',
            'pekerjaan' => 'required',
            'fakultas' => 'required',
            'email' => [
                'required',
                'email:dns',
                'unique:users',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^\d+@radenfatah\.ac\.id$/', $value)) {
                        $fail('Format email tidak valid. Gunakan email UIN Raden Fatah');
                    }
                },
            ],
            'password' => 'required|min:5',
        ]);

        // Validasi tambahan untuk memeriksa apakah NIM, pekerjaan, dan fakultas sudah terdaftar
        $nimExists = User::where('nim', $validatedData['nim'])->exists();
        $pekerjaanExists = User::where('pekerjaan', $validatedData['pekerjaan'])->exists();
        $fakultasExists = User::where('fakultas', $validatedData['fakultas'])->exists();

        if ($nimExists || $pekerjaanExists || $fakultasExists) {
            return redirect()->back()->withErrors([
                'message' => 'Registrasi gagal karena NIM, pekerjaan, atau fakultas sudah terdaftar.',
            ]);
        }
        
        // Proses pendaftaran jika data belum terdaftar
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        event(new Registered($user));

         return redirect()->route('DataUser')->with('success', 'Data berhasil disimpan');
     }
 
     public function DataUserUpdate(Request $request, $id)
     {   
         $validatedData= $request->validate([
             'nama' => 'required|max:255',
             'nim' => 'required|max:255',
             'nohp' => 'required|min:10 max:12',
             'pekerjaan' => 'required',
             'fakultas' => 'required',
             'role' => 'required',
             'email' => 'required|email:dns',
             'password' => 'nullable|min:5',
         ]);
 
         // kalau request password ada
         if($request->password) {
             User::where('id', $id)->update([
                 'nama' => $request->nama,
                 'nim' => $request->nim,
                 'nohp' => $request->nohp,
                 'pekerjaan' => $request->pekerjaan,
                 'fakultas' => $request->fakultas,
                 'role' => $request->role,
                 'email' => $request->email,
                 'password' => Hash::make($request->password),
             ]);
         } else {
             User::where('id', $id)->update([
                 'nama' => $request->nama,
                 'nim' => $request->nim,
                 'nohp' => $request->nohp,
                 'pekerjaan' => $request->pekerjaan,
                 'fakultas' => $request->fakultas,
                 'role' => $request->role,
                 'email' => $request->email,
                 // 'password' => $request->password,
             ]);
         }
 
         PengajuanPohon::where('user_id', $request->id)->update([
             'nama' => $request->nama,
             'nim' => $request->nim,
             'pekerjaan' => $request->pekerjaan,
             'fakultas' => $request->fakultas,
         ]);
         
         PengajuanSampah::where('user_id', $request->id)->update([
             'nama' => $request->nama,
             'nim' => $request->nim,
             'pekerjaan' => $request->pekerjaan,
             'fakultas' => $request->fakultas,
         ]);
         
         // dd($request->all());
         // Redirect atau berikan respon sesuai kebutuhan
         return redirect()->route('DataUser')->withErrors($validatedData)->with('success', 'Data berhasil disimpan');
     }
 
     public function DataUserDelete($id)
     {
         $datauserdelete = User::find($id);
         $datauserdelete->delete();
 
         return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $datauserdelete);
     }
 
     public function exportDataUser()
     {
         return Excel::download(new DataExportUser(), 'datauser.xlsx');
     }

     public function exportDataUserpdf()
     {
        $datauser = User::all();
        $pdf = PDF::loadView('Admin.Data_kegiatan.datauser-pdf', compact('datauser'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('datauser.pdf');
     }

    
    //Data Kegiatan

    // public function searchpohon(Request $request)
    // {
    //     $query = $request->input('query');

    //     // Lakukan proses pencarian data berdasarkan query
    //     $results = Pengajuanpohon::where('nama', 'like', "%$query%")
    //                 ->orWhere('nim', 'like', "%$query%")
    //                 ->get();

    //     // Check if results are empty
    //     if ($results->isEmpty()) {
    //         return view('Admin.Data_kegiatan.data_pohon')->with('message', 'No search results found.');
    //     }
        
    //     // Kirim data hasil pencarian ke tampilan
    //     return view('Admin.Data_kegiatan.data_pohon', ['datapohonuser' => $results]);
    // }

    //pohon
    // public function pohon(Request $request)
    // {   
    //     // Ambil tahun-tahun unik dari tabel dan urutkan secara ascending
    //     $years = Pengajuanpohon::selectRaw('YEAR(created_at) as year')
    //                            ->distinct()
    //                            ->orderBy('year', 'asc')
    //                            ->pluck('year');
    
    //     $selectedYear = $request->input('year');
    //     // Menggunakan metode when() untuk mengatur filter tahun jika dipilih
    //     $datapohonuser = Pengajuanpohon::when($selectedYear, function ($query, $year) {
    //         return $query->whereYear('created_at', $year);
    //     })
    //     ->orderBy('updated_at', 'desc')
    //     ->orderBy('created_at', 'desc')
    //     ->get();

    //     // Set notifikasi sebagai telah dibaca ketika diakses
    //     foreach (auth()->user()->unreadNotifications as $notification) {
    //         $notification->markAsRead();
    //     }
    
    //     return view('Admin.Data_kegiatan.data_pohon', compact('datapohonuser', 'years', 'selectedYear'));
    // }
    

    // public function DataPohonUpdate(Request $request, $id)
    // {
    //     // Validasi input jika diperlukan
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'nim' => 'required',
    //         'nohp' => 'required',
    //         'pekerjaan' => 'required',
    //         'fakultas' => 'required',
    //         'jenistanaman' => 'required',
    //         'tinggitanaman' => 'required|numeric',
    //         'jumlahtanaman' => 'required|numeric',
    //         'latitude' => 'required',
    //         'longitude' => 'required',
    //         'formFile' => 'nullable|mimes:jpeg,jpg,png|max:3048',
    //         'keterangan' => 'required',
    //         'status' => 'required|in:Diterima,Ditolak', 
    //     ]);

    //     // Check if a new formFile is uploaded
    //     if ($request->hasFile('formFile')) {
    //         $file = $request->file('formFile');
    //         // Validasi apakah file adalah gambar
    //         if (!$file->isValid()) {
    //             return redirect()->route('DataPohon')->withErrors(['formFile' => 'File yang diupload bukan gambar'])->withInput();
    //         }
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
            
    //         // Delete the old formFile if it exists
    //         if ($request->formFile) {
    //             Storage::delete('public/images/' . $request->formFile);
    //         }

    //         $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
    //     } else {
    //         $pengajuanPohon = PengajuanPohon::findOrFail($id);
    //         $gambar = $pengajuanPohon->formFile;
    //     }

    //     // Lakukan pembaruan pada data pengajuan pohon
    //     Pengajuanpohon::where('id', $id)->update([
    //         'nama' => $request->nama,
    //         'nim' => $request->nim,
    //         'nohp' => $request->nohp,
    //         'fakultas' => $request->fakultas,
    //         'pekerjaan' => $request->pekerjaan,
    //         'jenistanaman' => $request->jenistanaman,
    //         'tinggitanaman' => $request->tinggitanaman,
    //         'jumlahtanaman' => $request->jumlahtanaman,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'formFile' => $gambar,
    //         'keterangan' => $request->keterangan,
    //         'status' => $request->status,
    //         // tambahkan bidang lain yang ingin diperbarui di sini
    //     ]);

    //     // Ambil data pengajuan yang telah diperbarui dari database
    //     $pengajuan = Pengajuanpohon::findOrFail($id); // Ganti Pengajuanpohon dengan model yang sesuai

    //     $admins = User::where('role', 'admin')->get(); // Ambil semua user dengan role admin
    //     $notification = new DataTanamanNotification($pengajuan); // Ganti dengan DataSampahNotification jika diperlukan
    //     Notification::send($admins, $notification);

    //     // Redirect atau berikan respon sesuai kebutuhan
    //     return redirect()->route('DataPohon')->with('success', 'Data berhasil diubah');

    // }

    // public function DataPohonDelete($id)
    // {
    //     $datapohondelete = Pengajuanpohon::find($id); // Mengambil data berdasarkan ID
    //     $datapohondelete->delete(); // Menghapus data

    //     return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $datapohondelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
    // }
    
    // public function DataPohonUpdateStatus(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'status' => 'required',
    //         'keterangan' => 'nullable',
    //     ]);

    //     $datapohonuser = Pengajuanpohon::findOrFail($id);
    //     $datapohonuser->update($validatedData);

    //     // Kirim notifikasi perubahan status ke user
    //     $user = $datapohonuser->user; // Asumsikan ada relasi 'user' pada model Pengajuanpohon yang menghubungkan ke model User
    //     $user->notify(new DataTanamanStatusNotification($datapohonuser));

    //     return redirect()->back()->with('success', 'Data berhasil diupdate');
    // }

    // public function exportDatapohonuser(Request $request)
    // {
    //     $yearFilter = $request->input('year'); // Ambil tahun dari input request

    //     // Filter data berdasarkan tahun yang dipilih
    //     $datapohonuser = Pengajuanpohon::query();
    //     if ($yearFilter) {
    //         $datapohonuser->whereYear('created_at', $yearFilter);
    //     }

    //     $filename = 'datapohonuser';
    //     if ($yearFilter) {
    //         $filename .= '_' . $yearFilter; // Tambahkan tahun ke dalam nama file jika ada filter tahun
    //     }
    //     $filename .= '.xlsx';

    //     return Excel::download(new DataExportPohon($datapohonuser), $filename);
    // }


    //waste
    // public function sampah(Request $request)
    // {   
    //     // Ambil tahun-tahun unik dari tabel dan urutkan secara ascending
    //     $years = Pengajuansampah::selectRaw('YEAR(created_at) as year')
    //                         ->distinct()
    //                         ->orderBy('year', 'asc')
    //                         ->pluck('year');

    //     $selectedYear = $request->input('year');
    //     // Menggunakan metode when() untuk mengatur filter tahun jika dipilih
    //     $datasampahuser = Pengajuansampah::when($selectedYear, function ($query, $year) {
    //         return $query->whereYear('created_at', $year);
    //     })
    //     ->orderBy('updated_at', 'desc')
    //     ->orderBy('created_at', 'desc')
    //     ->get();

    //     // Set notifikasi sebagai telah dibaca ketika diakses
    //     foreach (auth()->user()->unreadNotifications as $notification) {
    //         $notification->markAsRead();
    //     }

    //     return view('Admin.Data_kegiatan.data_sampah', compact('datasampahuser', 'years', 'selectedYear'));
    // }

    // public function DataSampahUpdate(Request $request, $id)
    // {       
    //     // Validasi input jika diperlukan
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'nim' => 'required',
    //         'nohp' => 'required',
    //         'pekerjaan' => 'required',
    //         'fakultas' => 'required',
    //         'jenis_sampah' => 'required',
    //         'total' => 'required',
    //         'formFile' => 'nullable|mimes:jpeg,jpg,png|max:3048',
    //         'keterangan' => 'required',
    //         'status' => 'required|in:Diterima,Ditolak', // Nilai harus 'Acc' atau 'Ditolak'
    //     ]);
        
    //     // Check if a new formFile is uploaded
    //     if ($request->hasFile('formFile')) {
    //         $file = $request->file('formFile');
    //         // Validasi apakah file adalah gambar
    //         if (!$file->isValid()) {
    //             return redirect()->route('DataSampah')->withErrors(['formFile' => 'File yang diupload bukan gambar'])->withInput();
    //         }
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
            
    //         // Delete the old formFile if it exists
    //         if ($request->formFile) {
    //             Storage::delete('public/images/' . $request->formFile);
    //         }

    //         $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
    //     } else {
    //         $pengajuanSampah = Pengajuansampah::findOrFail($id);
    //         $gambar = $pengajuanSampah->formFile;
    //     }
        
    //     Pengajuansampah::where('id', $id)->update([
    //         'nama' => $request->nama,
    //         'nim' => $request->nim,
    //         'nohp' => $request->nohp,
    //         'fakultas' => $request->fakultas,
    //         'pekerjaan' => $request->pekerjaan,
    //         'jenis_sampah' => $request->jenis_sampah,
    //         'total' => $request->total,
    //         'formFile' => $gambar,
    //         'keterangan' => $request->keterangan,
    //         'status' => $request->status,
    //         // tambahkan bidang lain yang ingin diperbarui di sini
    //     ]);

    //     // Ambil data pengajuan yang telah diperbarui dari database
    //     $pengajuan = Pengajuansampah::findOrFail($id); // Ganti Pengajuanpohon dengan model yang sesuai

    //     $admins = User::where('role', 'admin')->get(); // Ambil semua user dengan role admin
    //     $notification = new DataSampahNotification($pengajuan); // Ganti dengan DataSampahNotification jika diperlukan
    //     Notification::send($admins, $notification);

    //     // Redirect atau berikan respon sesuai kebutuhan
    //     return redirect()->route('DataSampah')->with('success', 'Data berhasil diubah');
    // }

    // public function DataSampahDelete($id)
    // {
    //     $datasampahdelete = Pengajuansampah::find($id); // Mengambil data berdasarkan ID
    //     $datasampahdelete->delete(); // Menghapus data

    //     return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $datasampahdelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
    // }
    
    // public function DataSampahUpdateStatus(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'status' => 'required',
    //         'keterangan' => 'nullable',
    //     ]);

    //     $datasampahuser = Pengajuansampah::findOrFail($id);
    //     $datasampahuser->update($validatedData);

    //     // Kirim notifikasi perubahan status
    //     $admins = User::where('role', 'admin')->get(); // Ambil semua user dengan role admin
    //     $notification = new DataSampahStatusNotification($datasampahuser);
    //     Notification::send($admins, $notification);

    //     return redirect()->back()->with('success', 'Data berhasil diupdate');
    // }

    // public function exportDatasampahuser(Request $request)
    // {
    //     $yearFilter = $request->input('year'); // Ambil tahun dari input request

    //     // Filter data berdasarkan tahun yang dipilih
    //     $datasampahuser = Pengajuansampah::query();
    //     if ($yearFilter) {
    //         $datasampahuser->whereYear('created_at', $yearFilter);
    //     }
        
    //     $filename = 'datasampahuser';
    //     if ($yearFilter) {
    //         $filename .= '_'.$yearFilter; // Tambahkan tahun ke dalam nama file jika ada filter tahun
    //     }
    //     $filename .= '.xlsx';

    //     return Excel::download(new DataExportSampah($datasampahuser), $filename);
    // }

    // //energi
    // public function DataEnergi(Request $request)
    // {
    //     // Ambil tahun-tahun unik dari kolom "tanggal" pada tabel dan urutkan secara ascending
    //     $years = Pengajuanenergi::selectRaw('YEAR(tanggal) as year')
    //                             ->distinct()
    //                             ->orderBy('year', 'asc')
    //                             ->pluck('year');

    //     // Mengambil inputan tahun dari filter
    //     $selectedYear = $request->input('year');

    //     // Menggunakan metode when() untuk mengatur filter tahun jika dipilih
    //     $dataenergi = Pengajuanenergi::when($selectedYear, function ($query, $year) {
    //         return $query->whereYear('tanggal', $year);
    //     })
    //     ->orderBy('created_at', 'desc')
    //     ->get();

    //     return view('Admin.Data_kegiatan.data_energi', compact('dataenergi', 'years', 'selectedYear'));
    // }


    // public function TambahDataEnergi(Request $request)
    // {
    //     $kampus = $request->input('kampus');
    //     $tanggal = $request->input('tanggal');
    //     $totalEnergiListrik = $request->input('totalEnergiListrik');
    //     $totalEnergiTerbarukan = $request->input('totalEnergiTerbarukan');

    //     // Hitung rasio totalEnergiTerbarukan dibagi totalEnergiListrik
    //     $ratio = $this->calculateRatio($totalEnergiTerbarukan, $totalEnergiListrik);

    //     // Simpan data ke database
    //     Pengajuanenergi::create([
    //         'kampus' => $kampus,
    //         'tanggal' => $tanggal,
    //         'totalEnergiListrik' => $totalEnergiListrik,
    //         'totalEnergiTerbarukan' => $totalEnergiTerbarukan,
    //         'ratio' => $ratio, // Tambahkan rasio ke dalam array data
    //     ]);
    //     return redirect()->route('DataEnergi')->with('success', 'Data berhasil ditambahkan');
    // }

    // public function calculateRatio($totalEnergiTerbarukan, $totalEnergiListrik)
    // {
    //     if ($totalEnergiListrik != 0) {
    //         $ratio = $totalEnergiTerbarukan / $totalEnergiListrik;
    //     } else {
    //         $ratio = 0;
    //     }

    //     return $ratio;
    // }

    // public function DataEnergiUpdate(Request $request, $id)
    // {
    //     // Validasi input jika diperlukan
    //     $validatedData = $request->validate([
    //         'kampus' => 'required',
    //         'tanggal' => 'required',
    //         'totalEnergiListrik' => 'required',
    //         'totalEnergiTerbarukan' => 'required',
    //     ]);

    //     // Hitung ratio
    //     $totalEnergiListrik = $request->totalEnergiListrik;
    //     $totalEnergiTerbarukan = $request->totalEnergiTerbarukan;
    //     $ratio = $totalEnergiTerbarukan / $totalEnergiListrik;

    //     // Update data ke database
    //     Pengajuanenergi::where('id', $id)->update([
    //         'kampus' => $request->kampus,
    //         'tanggal' => $request->tanggal,
    //         'totalEnergiListrik' => $totalEnergiListrik,
    //         'totalEnergiTerbarukan' => $totalEnergiTerbarukan,
    //         'ratio' => $ratio,
    //     ]);
        
    //     // Redirect atau berikan respon sesuai kebutuhan
    //     return redirect()->route('DataEnergi')->withErrors($validatedData)->with('success', 'Data berhasil diubah');
    // }


    // public function DataEnergiDelete($id)
    // {
    //     $dataenergidelete = Pengajuanenergi::find($id);
    //     $dataenergidelete->delete();

    //     return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $dataenergidelete);
    // }

    // public function exportDataEnergi(Request $request)
    // {
    //     $selectedYear = $request->input('year');
    
    //     // Generate the filename with the selected year (if applicable)
    //     $filename = 'dataenergi';
    //     if ($selectedYear) {
    //         $filename .= '_' . $selectedYear;
    //     }
    //     $filename .= '.xlsx';
    
    //     // Export the data using the DataExportEnergi class with the selected year
    //     return Excel::download(new DataExportEnergi($selectedYear), $filename);
    // }

}
