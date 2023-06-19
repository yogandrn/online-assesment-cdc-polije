<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255|email:dns',
            'password' => 'required|string|max:255',
        ]);

        if (Auth::attempt($validated)) {
            if (auth()->user()->roles == 'ADMIN') {
                $request->session()->regenerate();

                return redirect()->intended('/admin/dashboard');
            } else {
                return back()->with('login-error', 'You have no access!');
            }
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
