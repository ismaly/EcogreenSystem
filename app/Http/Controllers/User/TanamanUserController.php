<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengajuanpohon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DataTanamanNotification;
use App\Notifications\DataTanamanUpdateNotification;
use App\Models\UserNotification;


class TanamanUserController extends Controller
{
    // halaman untuk user
    //POHON

    //Pengajuan pohon
    public function pengajuanpohon()
    {   
        $datapohonuser = Pengajuanpohon::orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();

        $user = auth()->user();
        $unreadNotifications = $user->unreadNotifications;

        // Mengatur jumlah notifikasi menjadi 0
        $unreadNotifications->markAsRead();

        return view('User.Tanaman.Pengajuan_tanaman', compact('datapohonuser'));
    }

    public function pengajuanpohoninsert(Request $request)
    {   
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'nohp' => 'required',
            'pekerjaan' => 'nullable',
            'fakultas' => 'nullable',
            'jenistanaman' => 'required',
            'tinggitanaman' => 'required|numeric',
            'jumlahtanaman' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required',
            'formFile' => 'required|mimes:jpeg,jpg,png|max:3048',
            
        ]);
    
        $userId = auth()->id(); // Get the ID of the currently logged-in user
        
        if ($request->hasFile('formFile')) {
            $file = $request->file('formFile');
            // Validate if the file is an image
            if (!$file->isValid()) {
                return redirect()->route('pengajuanpohon')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName); // Store the image in the public/images folder with a unique name
    
            $requestData = $request->all();
            $requestData['formFile'] = $fileName; // Store the file name in the 'formFile' field
            $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field
    
            Pengajuanpohon::create($requestData);
    
            // Dapatkan data pengajuan yang telah disimpan
            $pengajuan = Pengajuanpohon::latest()->first();
    
            $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();// Ambil semua user dengan peran admin
            Notification::send($admins, new DataTanamanNotification($pengajuan));
        } else {
            $requestData = $request->all();
            $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field
    
            ///nambah
            Pengajuanpohon::create($requestData);
            Notification::create([
                'type' => 'insertpengajuanpohon',
                'notifiable_type' => 'Pengajuanpohon', 
                'notifiable_id' => 'Pengajuanpohon', 
                'data' => 'Pengajuanpohon',
            ]);
            $pengajuan = Pengajuanpohon::latest()->first();

            // Kirim notifikasi ke admin
            $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();
            $notification = new DataTanamanNotification($pengajuan);
            
            foreach ($admins as $admin) {
                Notification::send($admin, $notification); // Menggunakan Notification::send
            }
        }
    
        $datapohonuser = Pengajuanpohon::where('user_id', $userId)->get();
    
        // return view('User.Tanaman.Pengajuan_tanaman', compact('datapohonuser'))->with('success', 'Data berhasil disimpan');
        return redirect()->back()->with('success', 'Data berhasil ditambahkan')->with('data', $datapohonuser);
    }
    
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
    //     // // Buat notifikasi untuk update data pengajuan pohon
    //     $notificationInstance = new DataTanamanUpdateNotification($pengajuanpohonupdate, $id);
    //     $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();

    //     Notification::send($admins, $notificationInstance);
    //     // Simpan perubahan
    //     // Redirect atau berikan respon sesuai kebutuhan
    //     return redirect()->back()->with('success', 'Data berhasil diubah')->with('data', $pengajuanpohonupdate);
    // }
    public function pengajuanpohonUpdate(Request $request, $id)
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
        ]);

        // Cari data pengajuan pohon berdasarkan ID
        $pengajuanpohonupdate = Pengajuanpohon::findOrFail($id);

        // Check if a new formFile is uploaded
        if ($request->hasFile('formFile')) {
            $file = $request->file('formFile');
            // Validasi apakah file adalah gambar
            if (!$file->isValid()) {
                return redirect()->route('pengajuanpohon')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
            
            // Delete the old formFile if it exists
            if ($pengajuanpohonupdate->formFile) {
                Storage::delete('public/images/' . $pengajuanpohonupdate->formFile);
            }

            $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
        } else {
            $gambar = $pengajuanpohonupdate->formFile;
        }

        // Cek apakah ada perubahan pada data
        $dataPerubahan = [
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
            // tambahkan bidang lain yang ingin diperbarui di sini
        ];

        // Cek perubahan data
        if ($dataPerubahan != $pengajuanpohonupdate->getOriginal()) {
            // Jika ada perubahan, kosongkan kolom status
            $dataPerubahan['status'] = null;
            $dataPerubahan['keterangan'] = null;
        }

        // Lakukan pembaruan pada data pengajuan pohon
        $pengajuanpohonupdate->update($dataPerubahan);

        // Buat notifikasi untuk update data pengajuan pohon
        $notificationInstance = new DataTanamanUpdateNotification($pengajuanpohonupdate, $id);
        $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();

        Notification::send($admins, $notificationInstance);
        
        // Simpan perubahan
        // Redirect atau berikan respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data berhasil diubah')->with('data', $pengajuanpohonupdate);
    }


    public function printReport_pohon($id)
    {
        $datapohonuser = Pengajuanpohon::find($id);

        if (!$datapohonuser) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        // Memastikan pengguna yang mencoba mengakses pencetakan adalah pemilik data
        if (auth()->user()->id === $datapohonuser->user_id) {
            // Cek apakah status adalah "Diterima"
            if ($datapohonuser->status === 'Diterima') {
                // Tampilkan tampilan pencetakan jika status "Diterima"
                return view('User.Tanaman.datapohonuser-print', compact('datapohonuser'));
            } else {
                // Redirect dengan pesan kesalahan jika status bukan "Diterima"
                return redirect()->back()->with('error', 'Data tidak dapat dicetak karena status bukan "Diterima".');
            }
        } else {
            // Pengguna tidak diizinkan mengakses pencetakan karena bukan pemilik data
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengakses pencetakan ini.');
        }
    }



    // public function pengajuanpohondelete($id)
    // {   
    //     $pengajuanpohondelete = Pengajuanpohon::find($id); // Mengambil data berdasarkan ID
    //     // unlink('public/images/' .  $pengajuanpohondelete->formFile);
    //     $pengajuanpohondelete->delete(); // Menghapus data

    //     return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $pengajuanpohondelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
    // }

    public function pengajuanpohondelete($id)
    {   
        $pengajuanpohondelete = Pengajuanpohon::find($id); // Mengambil data berdasarkan ID
        
        // Hapus gambar dari folder
        $gambarPath = 'public/images/' . $pengajuanpohondelete->formFile;
        if (Storage::exists($gambarPath)) {
            Storage::delete($gambarPath);
        }

        // Hapus data dari database
        $pengajuanpohondelete->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $pengajuanpohondelete);
    }

}
