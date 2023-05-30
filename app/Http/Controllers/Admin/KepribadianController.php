<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PernyataanKepribadian;
use Illuminate\Http\Request;

class KepribadianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = PernyataanKepribadian::find(1)->get();
        $title = 'Gaya Kepribadian';
        return view('admin.kepribadian', compact('questions'))->with('title', $title);
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
        //
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
            PernyataanKepribadian::where(['id' => $id])->update([
                'pernyataan' => $data['input_pernyataan_kepribadian'],
            ]);
            return redirect()->back()->with('success', 'Update Berhasil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = PernyataanKepribadian::findOrFail($id);

        if ($questions->delete()) {
            return redirect('pernyataan')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('pernyataan')->with('error', 'Gagal menghapus data');
        }
    }
}
