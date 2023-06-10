<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('users.login', ['title' => 'Login | CDC Polije']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/users');
        }
 
        return back()->with('toast_error', 'Failed to login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
