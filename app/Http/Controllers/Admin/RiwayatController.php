<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailHasilMinatKarir;
use App\Models\HasilKepribadian;
use App\Models\HasilMinatKarir;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TestHistory::with('user')->get();
        $title = 'Data Riwayat Tes';
        return view('admin.riwayat', compact('data'))->with('title', $title);
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
    public function update(Request $request, $id)
    {
        
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

            if ($request->type == 'Minat Karir') {
                $hasilMinat = HasilMinatKarir::where('test_history_id', $id)->first();
                DetailHasilMinatKarir::where('hasil_minat_karir_id', $hasilMinat->id)->delete();
                HasilMinatKarir::where('test_history_id', $id)->delete();
                TestHistory::where(['id' => $id])->delete();
            } 
            if ($request->type == 'Gaya Kepribadian') {
                HasilKepribadian::where('test_history_id', $id)->delete();
                TestHistory::where(['id' => $id])->delete();
            }

            return redirect('/admin/riwayat')->with('toast_success', 'Hapus Data Berhasil');
        }
        return redirect('/admin/riwayat')->with('toast_success', 'Hapus Data Berhasil');
    }

    public function detailMinatKarir($id) 
    {
        $result = HasilMinatKarir::where('test_history_id', $id)->with(['user', 'test', 'detail'])->first(); // ambil data hasil test
        $minatkarir = DetailHasilMinatKarir::where('hasil_minat_karir_id', $result['id'])->orderBy('point', 'desc')->get(); // ambil detail hasil
        $data_diagram = [
            intval($minatkarir[0]['point'] * 10),
            intval($minatkarir[1]['point'] * 10),
            intval($minatkarir[2]['point'] * 10),
            intval($minatkarir[3]['point'] * 10),
            intval($minatkarir[4]['point'] * 10),
            intval($minatkarir[5]['point'] * 10),
        ];

        $colors = [
            'Realistic' => '#54599e',
            'Investigative' => '#845EC2',
            'Artistic' => '#D65DB1',
            'Social' => '#FF6F91',
            'Enterprise' => '#FF9671',
            'Conventional' => '#FFC75F',
        ];

        $startedAt = \Carbon\Carbon::parse($result->test->started_at);
        $finishedAt = \Carbon\Carbon::parse($result->test->finished_at);

        $durasisec = $startedAt->diffInSeconds($finishedAt); // ambil data durasi test dalam detik
        $durasimin = $startedAt->diffInMinutes($finishedAt); // ambil data durasi test dalam menit
        $result['durasi_test'] = $durasimin . ' menit ' . $durasisec % 60 . ' detik'; // data durasi

        // return response()->json(['test_data' => $result, 'hasil' => $minatkarir, 'data_diagram'=>$data_diagram, 'title' => 'Hasil Tes Minat Karir | CDC Polije']);
        return view('admin.detail-minatkarir', ['test_data' => $result, 'hasil' => $minatkarir, 'data_diagram'=>$data_diagram, 'colors' => $colors, 'title' => 'Riwayat Tes']);
    }

    public function detailKepribadian($id) 
    {
        $result = HasilKepribadian::where('test_history_id', $id)->with(['kepribadian','user', 'test'])->first(); // ambil data hasil test

        $startedAt = \Carbon\Carbon::parse($result->test->started_at);
        $finishedAt = \Carbon\Carbon::parse($result->test->finished_at);

        $durasisec = $startedAt->diffInSeconds($finishedAt); // ambil data durasi test dalam detik
        $durasimin = $startedAt->diffInMinutes($finishedAt); // ambil data durasi test dalam menit
        $result['durasi_test'] = $durasimin . ' menit ' . $durasisec % 60 . ' detik'; // data durasi

        return view('admin.detail-kepribadian', ['hasil' => $result, 'title' => 'Riwayat Tes', 'durasi' => $durasisec]);
        // return response()->json( ['hasil' => $result, 'title' => 'Hasil Tes Gaya Kepribadian | CDC Polije', ]);
    }
}
