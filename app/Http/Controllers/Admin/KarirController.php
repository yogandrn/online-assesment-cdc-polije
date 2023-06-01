<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PernyataanMinatKarir;
use Illuminate\Http\Request;

class KarirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function realistic()
    {
        $karir = PernyataanMinatKarir::where("minat_karir_id", "=", "1")->get();
        $title = 'Data Realistic';
        return view('admin.karir.realistic', compact('karir'))->with('title', $title);
    }

    public function investigative()
    {
        $karir = PernyataanMinatKarir::where("minat_karir_id", "=", "2")->get();
        $title = 'Data Investigative';
        return view('admin.karir.investigative', compact('karir'))->with('title', $title);
    }

    public function artistic()
    {
        $karir = PernyataanMinatKarir::where("minat_karir_id", "=", "3")->get();
        $title = 'Data Artistic';
        return view('admin.karir.artistic', compact('karir'))->with('title', $title);
    }

    public function social()
    {
        $karir = PernyataanMinatKarir::where("minat_karir_id", "=", "4")->get();
        $title = 'Data Social';
        return view('admin.karir.social', compact('karir'))->with('title', $title);
    }

    public function enterprising()
    {
        $karir = PernyataanMinatKarir::where("minat_karir_id", "=", "5")->get();
        $title = 'Data Enterprising';
        return view('admin.karir.enterprising', compact('karir'))->with('title', $title);
    }

    public function conventional()
    {
        $karir = PernyataanMinatKarir::where("minat_karir_id", "=", "6")->get();
        $title = 'Data Conventional';
        return view('admin.karir.conventional', compact('karir'))->with('title', $title);
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
        $this->validate($request, [
            'pernyataan' => 'required',
            'minat_karir_id' => 'required',
        ]);
        $data = PernyataanMinatKarir::create([
            'pernyataan' => $request->pernyataan,
            'minat_karir_id' => $request->minat_karir_id,
        ]);
        if ($data) {
            return redirect()->back()->with('toast_success', 'Berhasil Ditambahkan');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            PernyataanMinatKarir::where(['id' => $id])->update([
                'pernyataan' => $data['pernyataan'],
            ]);
            return redirect()->back()->with('toast_success', 'Update Berhasil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            PernyataanMinatKarir::where(['id' => $id])->delete();
            return redirect()->back()->with('toast_success', 'Hapus Data Berhasil');
        }
    }
}
