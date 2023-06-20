<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $title = 'User';
        return view('admin.user', compact('users'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $posthashpw = Hash::make($request->password);
        $post['password'] = $posthashpw;

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'cdc-' . time() . '.' . $extenstion;
            $file->move('images', $filename);
            $post['foto'] = $filename;
        }
        User::create($post);
        return redirect()->back()->with('toast_success', 'Berhasil Ditambahkan');

        // $this->validate($request, [
        //     'nama' => 'required',
        //     'foto' => 'required',
        //     'no_telp' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        // $data = User::create([
        //     'pernyataan' => $request->pernyataan,
        // ]);
        // if ($data) {
        //     return redirect()->back()->with('toast_success', 'Berhasil Ditambahkan');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->get();
        $title = 'User Edit';
        return view('admin.useredit', ['data' => $data, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $image_path = public_path('images/' . $data->foto);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $post = $request->all();
        $posthashpw = Hash::make($request->password);
        $post['password'] = $posthashpw;

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'cdc-' . time() . '.' . $extenstion;
            $file->move('images', $filename);
            $post['foto'] = $filename;
        }
        User::findOrFail($id)->update($post);
        return redirect('/admin/user')->back()->with('toast_success', 'Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = User::find($id);
        $image_path = public_path('images/' . $data->foto);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->isMethod('post')) {
            User::where(['id' => $id])->delete();
            return redirect()->back()->with('toast_success', 'Hapus Data Berhasil');
        }
        return redirect()->back()->with('toast_success', 'Hapus Data Berhasil');
    }
}
