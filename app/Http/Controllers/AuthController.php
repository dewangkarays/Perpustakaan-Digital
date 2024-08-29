<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view ('login');
    }

    public function register() {
        return view ('register');
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // $request->session()->regenerate();
        if (Auth::attempt($credentials)) {
            
           if(Auth::user()->role_id==1) {
            return redirect('dashboard');
           }
           if(Auth::user()->role_id==2) {
            return redirect('profile');
           }

            
            
        }

        
        Session::flash('status', 'Gagal login. Periksa kembali username dan password.');

       
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function registerakun(Request $request)
    {
        
          $validated = $request->validate([
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:5',
            'phone' => 'required|unique:users',
        ]);

        $user = User::create($request->all());

        Session::flash('message', 'Register Success');
        return redirect('/');
    }
}
