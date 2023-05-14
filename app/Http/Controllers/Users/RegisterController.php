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
            'nama' => 'required|string|max:255|',
            'email' => 'unique:users|required|string|email:dns',
            'password' => 'required|string|alpha_num',
            'no_telp' => 'required|numeric|string|unique:users',
            'nim' => 'nullable|string|min:6|max:15',
            'jurusan' => 'string|nullable|min:6|max:255',
            'program_studi' => 'string|nullable|min:6|max:255',
            'url_linkedin' => 'string|nullable|min:6|max:255',
            'jenis_kandidat' => 'string|nullable|min:4|max:255',
            'perguruan_tinggi' => 'string|nullable|min:4|max:255',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return Redirect::back()->with('registerError', $error);
        } else {
            // if ($request->jenis_kandidat == 'Umum') {
            //     $campus = $request->perguruan_tinggi;
            // } else {
            //     $campus = 'Politeknik Negeri Jember';
            // }
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'jenjang' => $request->jenjang,
                'jurusan' => $request->jurusan,
                'program_studi' => $request->program_studi,
                'nim' => $request->nim,
                'password' => Hash::make($request->password),
                // 'perguruan_tinggi' => $request->campus,
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
