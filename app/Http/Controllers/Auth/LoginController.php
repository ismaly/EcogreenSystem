<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyEmail;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            if (Auth::user()->role == 'admin'){
                return redirect('Homeadmin');
            } elseif (Auth::user()->role == 'ketua') {
                return redirect('Homeadmin');
            } elseif (Auth::user()->role == 'tim') {
                return redirect('Homeadmin');
            } elseif (Auth::user()->role == 'civitas'){
                return redirect('Home');
            }
        }
        if (!User::where('email', $request->email)->exists()) {
            return redirect('login')->with('status', 'email_not_found');
        }
    
        return redirect('login')->with('status', 'wrong_password');
    }
}
