<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\Auth\VerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\User;

class RegisterController extends Controller
{   

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register()
    {
        return view('register');
    }

    public function registeruser(Request $request)
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
        
        // Proses pendaftaran jika data belum terdaftar
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $user->notify(new VerifyEmail);
        // event(new Registered($user));

        // return redirect('login')->with('success', 'Registrasi berhasil!! Silahkan login!');
        return redirect('login')->with('success', 'Pendaftaran berhasil, silakan login dan cek email Anda untuk verifikasi.');
        // return redirect()->back()->with('success', 'Pendaftaran berhasil, silakan cek email Anda untuk verifikasi.')->with('data', $user);
        // return redirect()->route('verification.notice');
        // dd($request->all());
    }

    protected function registered(Request $request, $user)
    {
        $user->notify(new VerifyEmail);
    }

}
