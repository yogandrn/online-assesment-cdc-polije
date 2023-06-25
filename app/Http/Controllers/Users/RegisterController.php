<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // halaman utama, pilih jenis kandidat
    public function index()
    {
        return view('users.register', ['title' => 'Register | CDC Polije']);
    }

    // halaman register untuk umum
    public function umum()
    {   
        return view('users.register-umum', ['title' => 'Register | CDC Polije']);
    }
    
    // halaman register sebagai mahasiwa dan alumni polije
    public function polije()
    {   
        return view('users.register-polije', ['title' => 'Register | CDC Polije']);
    }

    // method untuk register
    public function register(Request $request)
    {
        // validasi input        
        $validated = $request->validate([
            'nama' => 'required|string|max:255|',
            'email' => 'unique:users|required|string|email:dns',
            'password' => 'required|string|min:8|max:100|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]+$/',
            // 'password' => ['required', 'string', 'min:8', 'max:100', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]+$/'],
            'no_telp' => 'required|unique:users|string|regex:/^08[1-9]\d{8}$/',
            'nim' => 'nullable|string|min:6|max:15',
            'jurusan' => 'string|min:6|max:255',
            'program_studi' => 'string|min:6|max:255',
            'url_linkedin' => 'string|nullable|min:6|max:255',
            'jenis_kandidat' => 'string|min:4|max:255',
            'perguruan_tinggi' => 'string|min:4|max:255',
        ], 
        [
            'password.regex' => 'Password harus terdiri dari minimal 8 karakter dengan kombinasi huruf besar, huruf kecil, dan angka.',
            'no_telp.regex' => 'Format nomor telepon tidak valid.',
        ]);
        
        // insert data user ke database
        User::create([
            'nama' => $request->nama,
            'jenis_kandidat' => $request->jenis_kandidat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'jenjang' => $request->jenjang,
            'jurusan' => $request->jurusan,
            'program_studi' => $request->program_studi,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
            'perguruan_tinggi' => $request->perguruan_tinggi,
        ]);
        
        // pesan success 
        $request->session()->flash('toast_success', 'Registrasi berhasil. Silakan login');
        // redirect ke halaman login
        return redirect('/login');

    }
    
    public function addAdmin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255|',
                'email' => 'unique:users|required|string|email:dns',
                'password' => 'required|string|alpha_num|min:8|max:255',
                'no_telp' => 'required|numeric|string|unique:users',
                'nim' => 'nullable|string|min:6|max:15',
                'jurusan' => 'nullable|string|min:6|max:255',
                'program_studi' => 'nullable|string|min:6|max:255',
                'url_linkedin' => 'nullable|string|nullable|min:6|max:255',
                'jenis_kandidat' => 'string|min:4|max:255',
                'perguruan_tinggi' => 'string|min:4|max:255',
            ],);
            } catch (\Throwable $throw) {
                return response()->json([
                    'status' => 'error',
                    'message' => $throw->getMessage(),
                ], 500);
        }
    }
}
