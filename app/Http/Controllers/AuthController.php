<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('pages.login');
    }

    function loginStore(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ],
            [
                'email.exists' => 'email ini belum tersedia',
                'email.required' => 'email harus diisi',
                'password.required' => 'password harus diisi'
            ],
        );

        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->with('error', "gagal login, silahkan cek dan coba lagi!");
        }
    }

    function register()
    {
        return view('pages.register');
    }

    function registerStore(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'role' => 'user'
        ]);

        return redirect('/login')->with('success', 'Berhasil Buat Akun, Silakan Login');
    }

   
    function WelcomeDashboard()
    {
        return view('pages.admin.dashboard');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

   
    function userDestroy($id){
        
    }

}