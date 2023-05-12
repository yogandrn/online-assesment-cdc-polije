<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|alpha',
            'email' => 'unique:users|required|string|email:dns',
            'password' => 'required|string|alpha_num',
            'no_telp' => 'required|numeric|phone|unique:users',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return Redirect::back()->with('registerError', $error);
        } else {
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'password' => Hash::make($request->password),
            ]);

            $request->session()->flash('success', 'Registrasi berhasil. Silakan login');

            return redirect('/login');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255|alpha',
            'email' => 'unique:users|required|string|email:dns'
        ]);
    }
}
