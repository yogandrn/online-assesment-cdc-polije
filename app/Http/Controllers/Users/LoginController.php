<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // halaman login
    public function index()
    {
        return view('users.login', ['title' => 'Login | CDC Polije']);
    }

    // method login untuk autentikasi pengguna
    public function authenticate(Request $request)
    {
        // validasi input user
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);
 
        // check credentials user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // jika berhasil, arahkan ke halaman home
            return redirect()->intended('/users')->with('toast_success', 'Login berhasil.');
        }
 
        // jika gagal, tampilkan pesan error
        return back()->with('toast_error', 'Failed to login!');
    }

    // method untuk logout
    public function logout(Request $request)
    {
        Auth::logout(); // logut

        $request->session()->regenerateToken(); // set ulang session

        return redirect('/'); // redirect ke halaman landingpage
    }
}
