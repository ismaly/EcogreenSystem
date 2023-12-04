<?php

namespace App\Models;
namespace App\Http\Controllers\User;
use Carbon\Carbon;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use App\Models\formuser;
use Illuminate\Http\Request;
use App\Models\Pengajuanpohon;
use App\Models\Pengajuansampah; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Monitorpohon;
use App\Models\Pengajuanpohoninsert;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DataTanamanNotification;
use App\Notifications\DataSampahNotification;
use App\Notifications\DataTanamanUpdateNotification;
use App\Notifications\DataSampahUpdateNotification;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{       
   

    public function profile()
    {
        $datauser = User::all();
        return view('User.profile');
    }

    public function Editprofile(Request $request, $id)
    {
        $validatedData= $request->validate([
            'nama' => 'required|max:255',
            'nim' => 'required|max:255',
            'nohp' => 'required|min:10 max:12',
            'pekerjaan' => 'required',
            'fakultas' => 'required',
            'email' => 'required|email:dns',
            'password' => 'nullable|min:5',
            'avatar' => 'nullable|mimes:jpeg,png,jpg|max:2048', // Validasi file foto profil
        ]);

        // kalau request password ada
        if($request->password) {
            User::where('id', $id)->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'nohp' => $request->nohp,
                'pekerjaan' => $request->pekerjaan,
                'fakultas' => $request->fakultas,
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
                'email' => $request->email,
                // 'password' => $request->password,
            ]);
        }

         // Jika ada file foto profil yang diunggah
        if ($request->hasFile('avatar')) {
            // Hapus foto profil lama (jika ada)
            if (Auth::user()->avatar && Storage::exists('public/avatar/' . Auth::user()->avatar)) {
                Storage::delete('public/avatar/' . Auth::user()->avatar);
            }

            // Simpan file foto profil yang baru diunggah
            $avatarName = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/avatar', $avatarName);

            // Update kolom avatar pada tabel user
            User::where('id', $id)->update([
                'avatar' => $avatarName,
            ]);
        }

        return redirect()->route('profile')->with('success', 'Data berhasil diubah');
    }

    // halaman untuk user
    //POHON

    //Pengajuan pohon
    // public function pengajuanpohon()
    // {   
    //     $datapohonuser = Pengajuanpohon::orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();

    //      // Set notifikasi sebagai telah dibaca ketika diakses
    //     auth()->user()->unreadNotifications->markAsRead();

    //     return view('User.Tanaman.Pengajuan_tanaman', compact('datapohonuser'));
    // }

    // public function pengajuanpohoninsert(Request $request)
    // {   
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'nim' => 'required',
    //         'nohp' => 'required',
    //         'pekerjaan' => 'nullable',
    //         'fakultas' => 'nullable',
    //         'jenistanaman' => 'required',
    //         'tinggitanaman' => 'required|numeric',
    //         'jumlahtanaman' => 'required|numeric',
    //         'latitude' => 'required',
    //         'longitude' => 'required',
    //         'formFile' => 'required|mimes:jpeg,jpg,png|max:3048',
            
    //     ]);
    
    //     $userId = auth()->id(); // Get the ID of the currently logged-in user
        
    //     if ($request->hasFile('formFile')) {
    //         $file = $request->file('formFile');
    //         // Validate if the file is an image
    //         if (!$file->isValid()) {
    //             return redirect()->route('pengajuanpohon')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
    //         }
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->storeAs('public/images', $fileName); // Store the image in the public/images folder with a unique name
    
    //         $requestData = $request->all();
    //         $requestData['formFile'] = $fileName; // Store the file name in the 'formFile' field
    //         $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field
    
    //         Pengajuanpohon::create($requestData);
    
    //         // Dapatkan data pengajuan yang telah disimpan
    //         $pengajuan = Pengajuanpohon::latest()->first();
    
    //         // Kirim notifikasi ke admin
    //         $admins = User::where('role', 'admin')->get(); // Ambil semua user dengan peran admin
    //         Notification::send($admins, new DataTanamanNotification($pengajuan));
    //     } else {
    //         $requestData = $request->all();
    //         $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field
    
    //         Pengajuanpohon::create($requestData);
    
    //         // Dapatkan data pengajuan yang telah disimpan
    //         $pengajuan = Pengajuanpohon::latest()->first();
    
    //         // Kirim notifikasi ke admin
    //         $admins = User::where('role', 'admin')->get();
    //         $notification = new DataTanamanNotification($requestData); // Ganti dengan DataSampahNotification jika diperlukan
    //         Notification::send($admins, $notification);
    //     }
    
    //     $datapohonuser = Pengajuanpohon::where('user_id', $userId)->get();
    
    //     return view('User.Tanaman.Pengajuan_tanaman', compact('datapohonuser'))->with('success', 'Data berhasil disimpan');
    // }
    
    
    // public function printReport_pohon($id)
    // {
    //     $datapohonuser = pengajuanpohon::find($id);
    
    //     if (!$datapohonuser) {
    //         return redirect()->back()->with('error', 'Data not found.');
    //     }
    
    //     return view('User.Tanaman.datapohonuser-print', compact('datapohonuser'));
    // }

    // public function pengajuanpohondelete($id)
    // {   
    //     $pengajuanpohondelete = Pengajuanpohon::find($id); // Mengambil data berdasarkan ID
    //     $pengajuanpohondelete->delete(); // Menghapus data

    //     return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $pengajuanpohondelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
    // }

    // public function pengajuanpohonUpdate(Request $request, $id)
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
    //     ]);

    //     // Cari data pengajuan pohon berdasarkan ID
    //     $pengajuanpohonupdate = Pengajuanpohon::findOrFail($id);

    //     // Check if a new formFile is uploaded
    //     if ($request->hasFile('formFile')) {
    //         $file = $request->file('formFile');
    //         // Validasi apakah file adalah gambar
    //         if (!$file->isValid()) {
    //             return redirect()->route('pengajuanpohon')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
    //         }
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
            
    //         // Delete the old formFile if it exists
    //         if ($pengajuanpohonupdate->formFile) {
    //             Storage::delete('public/images/' . $pengajuanpohonupdate->formFile);
    //         }

    //         $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
    //     } else {
    //         $gambar = $pengajuanpohonupdate->formFile;
    //     }

    //     // Lakukan pembaruan pada data pengajuan pohon
    //     $pengajuanpohonupdate->update([
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
    //         // tambahkan bidang lain yang ingin diperbarui di sini
    //     ]);

    //     // Kirim notifikasi ke admin tentang perubahan data pengajuan pohon
    //     $admins = User::where('role', 'admin')->get(); // Ambil semua user dengan peran admin
    //     Notification::send($admins, new DataTanamanUpdateNotification($pengajuanpohonupdate));
        
    //     // Simpan perubahan
    //     // Redirect atau berikan respon sesuai kebutuhan
    //     return redirect()->back()->with('success', 'Data berhasil diubah')->with('data', $pengajuanpohonupdate);
    // }

  
    //WS
    //pengajuansampah
    // public function pengajuansampah()
    // {
    //     $datasampahuser = Pengajuansampah::orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();
        
    //     auth()->user()->unreadNotifications->markAsRead();

    //     return view('User.WS.Pengajuansampah', compact('datasampahuser'));
    // }

    // public function pengajuansampahinsert(Request $request)
    // {   
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'nim' => 'required',
    //         'nohp' => 'required',
    //         'pekerjaan' => 'nullable',
    //         'fakultas' => 'nullable',
    //         'jenis_sampah' => 'required',
    //         'total' => 'required',
    //         'formFile' => 'required|mimes:jpeg,jpg,png|max:3048',
    //     ]);

    //     $userId = auth()->id(); // Get the ID of the currently logged-in user
        
    //     if ($request->hasFile('formFile')) {
    //         $file = $request->file('formFile');
    //         // Validate if the file is an image
    //         if (!$file->isValid()) {
    //             return redirect()->route('pengajuansampah')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
    //         }
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->storeAs('public/images', $fileName); // Store the image in the public/images folder with a unique name

    //         $requestData = $request->all();
    //         $requestData['formFile'] = $fileName; // Store the file name in the 'formFile' field
    //         $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field

    //         Pengajuansampah::create($requestData);

    //         // Dapatkan data pengajuan yang telah disimpan
    //         $pengajuan = Pengajuansampah::latest()->first();

    //         // Kirim notifikasi ke admin
    //         $admins = User::where('role', 'admin')->get(); // Ambil semua user dengan peran admin
    //         Notification::send($admins, new DataSampahNotification($pengajuan));
    //     } else {
    //         $requestData = $request->all();
    //         $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field

    //         Pengajuansampah::create($requestData);

    //         // Dapatkan data pengajuan yang telah disimpan
    //         $pengajuan = Pengajuansampah::latest()->first();

    //         $admins = User::where('role', 'admin')->get();
    //         $notification = new DataSampahNotification($requestData); // Ganti dengan DataSampahNotification jika diperlukan
    //         Notification::send($admins, $notification);
    //     }

    //     $datasampahuser = Pengajuansampah::where('user_id', $userId)->get();

    //     return view('User.WS.Pengajuansampah', compact('datasampahuser'))->with('success', 'Data berhasil disimpan');
    // }


    // public function pengajuansampahdelete($id)
    // {   
    //     $pengajuansampahdelete = Pengajuansampah::find($id); // Mengambil data berdasarkan ID
    //     $pengajuansampahdelete->delete(); // Menghapus data

    //     return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $pengajuansampahdelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
    // }

    // public function pengajuansampahUpdate(Request $request, $id)
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
    //     ]);
        
    //     // Cari data pengajuan sampah berdasarkan ID
    //     $pengajuansampahupdate = Pengajuansampah::findOrFail($id);

    //     // Check if a new formFile is uploaded
    //     if ($request->hasFile('formFile')) {
    //         $file = $request->file('formFile');
    //         // Validasi apakah file adalah gambar
    //         if (!$file->isValid()) {
    //             return redirect()->route('pengajuansampah')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
    //         }
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
            
    //         // Delete the old formFile if it exists
    //         if ($pengajuansampahupdate->formFile) {
    //             Storage::delete('public/images/' . $pengajuansampahupdate->formFile);
    //         }

    //         $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
    //     } else {
    //         $gambar = $pengajuansampahupdate->formFile;
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
    //         // tambahkan bidang lain yang ingin diperbarui di sini
    //     ]);

    //     // Kirim notifikasi ke admin tentang perubahan data pengajuan sampah
    //     $pengajuanSampah = Pengajuansampah::findOrFail($id); // Cari data pengajuan sampah berdasarkan ID
    //     $admins = User::where('role', 'admin')->get(); // Ambil semua user dengan role admin
    //     $notification = new DataSampahUpdateNotification($pengajuanSampah);
    //     Notification::send($admins, $notification);
        
    //     // Redirect atau berikan respon sesuai kebutuhan
    //     return redirect()->back()->with('success', 'Data berhasil diubah')->with('data', $pengajuansampahupdate);
    // }

    
    // public function printsampah($id)
    // {
    //     $datasampahuser = pengajuansampah::find($id);

    //     if (!$datasampahuser) {
    //         return redirect()->back()->with('error', 'Data not found.');
    //     }

    //     return view('User.WS.datasampahuser-print', compact('datasampahuser'));
    // }
    
}

