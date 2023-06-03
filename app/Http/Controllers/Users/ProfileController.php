<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TestHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|min:3',
            'no_telp' => ['string', 'required', 'numeric', Rule::unique('users')->ignore($id)],
            'nim' => ['string', 'required', 'nullable', 'min:4', 'max:12', Rule::unique('users')->ignore($id)],
            'jurusan' => 'string|min:6|max:255',
            'jurusan' => 'string|required|max:255',
            'program_studi' => 'string|min:6|max:255',
            'url_linkedin' => 'string|nullable|min:6|max:255',
            'jenis_kandidat' => 'string|min:4|max:255',
            'perguruan_tinggi' => 'string|min:4|max:255',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return Redirect::back()->with('update-error', $error);
        } else {
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
            return redirect('/users/profile')->with('success', 'Berhasil memperbarui data');
        }
    }
}
