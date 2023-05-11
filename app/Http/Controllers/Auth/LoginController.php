<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255|email:dns',
            'password' => 'required|string|max:255',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->with('login-error', 'Failed to Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
