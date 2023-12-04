<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengajuansampah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DataSampahNotification;
use App\Notifications\DataSampahUpdateNotification;

class SampahUserController extends Controller
{
     //WS
    //pengajuansampah
    public function pengajuansampah()
    {
        $datasampahuser = Pengajuansampah::orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();
        
        $user = auth()->user();
        $unreadNotifications = $user->unreadNotifications;

        // Mengatur jumlah notifikasi menjadi 0
        $unreadNotifications->markAsRead();

        return view('User.WS.Pengajuansampah', compact('datasampahuser'));
    }

    public function pengajuansampahinsert(Request $request)
    {   
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'nohp' => 'required',
            'pekerjaan' => 'nullable',
            'fakultas' => 'nullable',
            'jenis_sampah' => 'required',
            'total' => 'required',
            'formFile' => 'required|mimes:jpeg,jpg,png|max:3048',
        ]);

        $userId = auth()->id(); // Get the ID of the currently logged-in user
        
        if ($request->hasFile('formFile')) {
            $file = $request->file('formFile');
            // Validate if the file is an image
            if (!$file->isValid()) {
                return redirect()->route('pengajuansampah')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName); // Store the image in the public/images folder with a unique name

            $requestData = $request->all();
            $requestData['formFile'] = $fileName; // Store the file name in the 'formFile' field
            $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field

            Pengajuansampah::create($requestData);

            // Dapatkan data pengajuan yang telah disimpan
            $pengajuan = Pengajuansampah::latest()->first();

            $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();
            Notification::send($admins, new DataSampahNotification($pengajuan));

        } else {
            $requestData = $request->all();
            $requestData['user_id'] = $userId; // Store the user ID in the 'user_id' field

            Pengajuansampah::create($requestData);
            Notification::create([
                'type' => 'insertpengajuansampah',
                'notifiable_type' => 'Pengajuansampah', 
                'notifiable_id' => 'Pengajuansampah', 
                'data' => 'Pengajuansampah',
            ]);
            // Dapatkan data pengajuan yang telah disimpan
            $pengajuan = Pengajuansampah::latest()->first();

            // Send notification to admins
            $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();
            $notification = new DataSampahNotification($pengajuan);
            
            foreach ($admins as $admin) {
                Notification::send($admin, $notification); // Menggunakan Notification::send
            }

        }

        $datasampahuser = Pengajuansampah::where('user_id', $userId)->get();
        // return view('User.WS.Pengajuansampah', compact('datasampahuser'))->with('data', $pengajuan);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan')->with('data', $datasampahuser);
        
    }


    // public function pengajuansampahdelete($id)
    // {   
    //     $pengajuansampahdelete = Pengajuansampah::find($id); // Mengambil data berdasarkan ID
    //     // unlink('public/images/' . $pengajuansampahdelete->formFile);
    //     $pengajuansampahdelete->delete(); // Menghapus data

    //     return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $pengajuansampahdelete); // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan data
    // }
    public function pengajuansampahdelete($id)
    {   
        $pengajuansampahdelete = Pengajuansampah::find($id); // Mengambil data berdasarkan ID
        
        // Hapus gambar dari folder
        $gambarPath = 'public/images/' . $pengajuansampahdelete->formFile;
        if (Storage::exists($gambarPath)) {
            Storage::delete($gambarPath);
        }

        // Hapus data dari database
        $pengajuansampahdelete->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus')->with('data', $pengajuansampahdelete);
    }


    public function pengajuansampahUpdate(Request $request, $id)
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
        ]);
        
        // Cari data pengajuan sampah berdasarkan ID
        $pengajuansampahupdate = Pengajuansampah::findOrFail($id);

        // Check if a new formFile is uploaded
        if ($request->hasFile('formFile')) {
            $file = $request->file('formFile');
            // Validasi apakah file adalah gambar
            if (!$file->isValid()) {
                return redirect()->route('pengajuansampah')->withErrors(['formFile' => 'Upload foto format jpeg,jpg,png max 2 KB'])->withInput();
            }
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName); // Menyimpan gambar di folder public/images dengan nama unik
            
            // Delete the old formFile if it exists
            if ($pengajuansampahupdate->formFile) {
                Storage::delete('public/images/' . $pengajuansampahupdate->formFile);
            }

            $gambar = $fileName; // Menyimpan nama file gambar ke dalam field 'formFile'
        } else {
            $gambar = $pengajuansampahupdate->formFile;
        }
        
        // Cek apakah ada perubahan pada data
        $dataPerubahan = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'nohp' => $request->nohp,
            'fakultas' => $request->fakultas,
            'pekerjaan' => $request->pekerjaan,
            'jenis_sampah' => $request->jenis_sampah,
            'total' => $request->total,
            'formFile' => $gambar,
            // tambahkan bidang lain yang ingin diperbarui di sini
        ];
        // Pengajuansampah::where('id', $id)->update([
        //     'nama' => $request->nama,
        //     'nim' => $request->nim,
        //     'nohp' => $request->nohp,
        //     'fakultas' => $request->fakultas,
        //     'pekerjaan' => $request->pekerjaan,
        //     'jenis_sampah' => $request->jenis_sampah,
        //     'total' => $request->total,
        //     'formFile' => $gambar,
        //     // tambahkan bidang lain yang ingin diperbarui di sini
        // ]);

        // Cek perubahan data
        if ($dataPerubahan != $pengajuansampahupdate->getOriginal()) {
            // Jika ada perubahan, kosongkan kolom status
            $dataPerubahan['status'] = null;
            $dataPerubahan['keterangan'] = null;
        }

        // Lakukan pembaruan pada data pengajuan pohon
        $pengajuansampahupdate->update($dataPerubahan);

        // // Buat notifikasi untuk update data pengajuan pohon
        $notificationInstance = new DataSampahUpdateNotification($pengajuansampahupdate, $id);
        $admins = User::whereIn('role', ['admin', 'ketua', 'tim'])->get();

        Notification::send($admins, $notificationInstance);
        
        // Redirect atau berikan respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data berhasil diubah')->with('data', $pengajuansampahupdate);
    }

    
    public function printsampah($id)
    {
        $datasampahuser = pengajuansampah::find($id);

        if (!$datasampahuser) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        // Memastikan pengguna yang mencoba mencetak adalah pemilik data
        if (auth()->user()->id === $datasampahuser->user_id) {
            return view('User.WS.datasampahuser-print', compact('datasampahuser'));
        } else {
            // Pengguna tidak diizinkan mencetak karena bukan pemilik data
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mencetak data ini.');
        }
    }

}
