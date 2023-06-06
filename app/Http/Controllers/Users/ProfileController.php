<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TestHistory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->with(['test_histories'])->first();
        $countMinatKarir = TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Minat Karir')->count();
        $countKepribadian = TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Gaya Kepribadian')->count();
        return view('users.profile', ['title' => 'Profil Saya | CDC Polije', 'user' => $user, 'minat_karir' => $countMinatKarir, 'gaya_kepribadian' => $countKepribadian]);
        // return response()->json(['user' => $user, 'minat_karir' => $countMinatKarir, 'gaya_kepribadian' => $countKepribadian]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit-profile', ['title' => 'Edit Profil | CDC Polije', 'user' => $user]);
    }

    public function update(Request $request, $id)
    {

        try {
            $user = Auth::user();
            $ijazah = null;
            $ktp = null;
            // $validated = $request->validate([
            //     'nama' => 'required|string|max:255|min:4',
            //     'no_telp' => ['string', 'required', 'numeric', Rule::unique('users')->ignore($id)],
            //     'nim' => ['string', 'nullable', 'min:4', 'max:12', Rule::unique('users')->ignore($id)],
            //     'jenjang' => 'string|required|max:255',
            //     'jurusan' => 'string|required|max:255|min:6',
            //     'program_studi' => 'string|min:6|max:255|required',
            //     'url_linkedin' => 'string|nullable|min:6|max:255',
            //     'jenis_kandidat' => 'string|min:4|max:255',
            //     'perguruan_tinggi' => 'string|min:4|max:255',
            // ]);
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255|min:4',
                'no_telp' => ['string', 'required', 'numeric', Rule::unique('users')->ignore($id)],
                'nim' => ['string', 'nullable', 'min:4', 'max:12', Rule::unique('users')->ignore($id)],
                'jenjang' => 'string|required|max:255',
                'jurusan' => 'string|required|max:255|min:6',
                'program_studi' => 'string|min:6|max:255|required',
                'url_linkedin' => 'string|nullable|min:6|max:255',
                'jenis_kandidat' => 'string|min:4|max:255',
                'perguruan_tinggi' => 'string|min:4|max:255',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return Redirect::back()->with('toast_error',  $error);
            }

            User::where('id', $id)->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'no_telp' => $request->no_telp,
                'perguruan_tinggi' => $request->perguruan_tinggi,
                'jenjang' => $request->jenjang,
                'jurusan' => $request->jurusan,
                'program_studi' => $request->program_studi,
                'url_linkedin' => $request->url_linkedin,
                'updated_at' => now(),
            ]);
            return redirect('/users/profile')->with('toast_success', 'Berhasil memperbarui data');
        } catch (Exception $error) {
            return back()->with('toast_error',  $error);
        }
    }

    public function uploadIjazah(Request $request, $id)
    {
        # code...
    }

    public function uploadKtp(Request $request, $id)
    {
        # code...
    }

    public function uploadFoto(Request $request, $id)
    {
        try {
            $user = User::find($id);

            $this->validate($request, [
                'foto' => 'required|image|mimes:jpg,png,jpeg|max:1024'
            ]);

            $fileToDelete = $user->foto;
            
            if ($request->hasFile('foto')) {
                $gambar = $request->file('foto');

                // Buat objek gambar menggunakan intervention/image
                $image = Image::make($gambar);
                
                // Ubah ukuran gambar menjadi 400x400 piksel dengan rasio 1:1
                $image->fit(500, 500);
                
                $dir = 'assets/img/user/photos'; 
                if (!file_exists(public_path($dir))) { //Verify if the directory exists
                    mkdir(public_path($dir), 777, true); //create it if do not exists
                }

                // Simpan gambar yang telah diubah ke dalam direktori yang diinginkan
                $filename = date('Ymd') . Str::random(24) . '.' . $gambar->getClientOriginalExtension();
                $image->save($dir .'/' . $filename, 70);
                // $foto = $request->file('foto')->storeAs($dir, date('Ymd') . Str::random(36) . '.' . $gambar->getClientOriginalExtension(), 'public');
                // Lanjutkan dengan logika lainnya
                // User::where('id', $id)->update([
                    //     'foto' => $foto,
                    // ]);
                $user->foto = $dir .'/'.$filename;
                $user->save();
                
                if ($user->foto != null) {
                    unlink($fileToDelete);
                }

                return redirect()->back()->with('toast_success', 'Berhasil mengunggah gambar');
            }

            return redirect()->back()->with('toast_error', 'Terjadi kesalahan saat mengunggah gambar.');
        } catch (Exception $e) {
            
            return redirect()->back()->with('toast_error', $e->getMessage());
        }
    }
    
}
