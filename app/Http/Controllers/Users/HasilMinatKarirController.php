<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DetailHasilMinatKarir;
use App\Models\HasilMinatKarir;
use App\Models\PernyataanMinatKarir;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilMinatKarirController extends Controller
{

    // method menampilkan detail hasil test
    public function detail($token)
    {
        $result = HasilMinatKarir::where('test_token', $token)->with(['user', 'test', 'detail'])->first(); // ambil data hasil test
        $minatkarir = DetailHasilMinatKarir::where('hasil_minat_karir_id', $result['id'])->orderBy('point', 'desc')->get(); // ambil detail hasil
        $data_diagram = [
            intval($minatkarir[0]['point'] * 10),
            intval($minatkarir[1]['point'] * 10),
            intval($minatkarir[2]['point'] * 10),
            intval($minatkarir[3]['point'] * 10),
            intval($minatkarir[4]['point'] * 10),
            intval($minatkarir[5]['point'] * 10),
        ];

        $startedAt = \Carbon\Carbon::parse($result->test->started_at);
        $finishedAt = \Carbon\Carbon::parse($result->test->finished_at);

        $durasisec = $startedAt->diffInSeconds($finishedAt); // ambil data durasi test dalam detik
        $durasimin = $startedAt->diffInMinutes($finishedAt); // ambil data durasi test dalam menit
        $result['durasi_test'] = $durasimin . ' menit ' . $durasisec % 60 . ' detik'; // data durasi

        // return response()->json(['test_data' => $result, 'hasil' => $minatkarir, 'data_diagram'=>$data_diagram, 'title' => 'Hasil Tes Minat Karir | CDC Polije']);
        return view('users.hasil-karir', ['test_data' => $result, 'hasil' => $minatkarir, 'data_diagram'=>$data_diagram, 'title' => 'Hasil Tes Minat Karir | CDC Polije']);
    }
    
    public function printPDF($token)
    {
        $result = HasilMinatKarir::where('test_token', $token)->with(['user', 'test', 'detail'])->first(); // ambil data hasil test
        $minatkarir = DetailHasilMinatKarir::where('hasil_minat_karir_id', $result['id'])->orderBy('point', 'desc')->get(); // ambil detail hasil
    
        $startedAt = \Carbon\Carbon::parse($result->test->started_at);
        $finishedAt = \Carbon\Carbon::parse($result->test->finished_at);
    
        $durasisec = $startedAt->diffInSeconds($finishedAt); // ambil data durasi test dalam detik
        $durasimin = $startedAt->diffInMinutes($finishedAt); // ambil data durasi test dalam menit
        $result['durasi_test'] = $durasimin . ' menit ' . $durasisec % 60 . ' detik'; // data durasi
    
        // return response()->json(['test_data' => $result, 'hasil' => $minatkarir, 'title' => 'Hasil Tes Minat Karir | CDC Polije']);
        return view('users.cetak-minatkarir', ['test_data' => $result, 'hasil' => $minatkarir, 'title' => 'Hasil Tes Minat Karir | CDC Polije']);
    }

    // method menampilkan history test user
    public function history()
    {
        $result = HasilMinatKarir::where('user_id', Auth::user()->id)->with('test')->orderBy('created_at', 'desc')->paginate(10);

        return view('users.riwayat-minatkarir', ['hasil' => $result, 'title' => 'Riwayat Tes Minat Karir | CDC Polije']);
    }

    // method untuk meghitung hasil test dan menyimpan ke database
    public function store(Request $request)
    {

        // cari data history test dan ubah statusnya menjadi finished
        TestHistory::where('id', $request->test_history_id)->update([
            'status' => 'FINISHED',
            'finished_at' => now(),
            'updated_at' => now(),
        ]);

        $pernyataan = PernyataanMinatKarir::get(); // ambil data pernyataan minat karir
        $arrayOfJenis = []; // buat temporary array untuk menampung score data karir

        // score dari masing masing kepribadian
        $score1 = 0;
        $score2 = 0;
        $score3 = 0;
        $score4 = 0;
        $score5 = 0;
        $score6 = 0;

        $data = $request->all(); // ambil semua jawaban dari request
        $temp = []; // array untuk menyimpan score masing masing kepribadian

        // masukkan data query ke variable $temp  
        foreach($pernyataan as $item) :
            $temp[strval($item->id)] = $item->minat_karir_id;
        endforeach;
        $arrayOfJenis = $temp; // masukkan ke dalam array score 
        
        
        foreach ($pernyataan as $item) :
            $key = strval($item->id); // mengubah index menjadi array key
            
            // menambahkan score sesuai dengan jenis kepribadian
            if ($arrayOfJenis[$key] == 1 ) {
                $score1 = $score1 + intval($data[$key]);
            } 
            elseif ($arrayOfJenis[$key] == 2 ) {
                $score2 = $score2 + intval($data[$key]);
            } 
            elseif ($arrayOfJenis[$key] == 3 ) {
                $score3 = $score3 + intval($data[$key]);
            } 
            elseif ($arrayOfJenis[$key] == 4 ) {
                $score4 = $score4 + intval($data[$key]);
            } 
            elseif ($arrayOfJenis[$key] == 5 ) {
                $score5 = $score5 + intval($data[$key]);
            } 
            elseif ($arrayOfJenis[$key] == 6 ) {
                $score6 = $score6 + intval($data[$key]);
            } else {
                echo('<script>console.log($score});</script>');
            }
        endforeach;

        // for ($i=1; $i <= count($pernyataan); $i++) { 
        //     $key = strval($i); // convert index menjadi array key
        //     if($pernyataan[$data[$key]])
        //     if ($i > 0 && $i <= 10) {
        //         $key = strval($i);
        //         $score1 = $score1 + intval($request[$key] ?? 0);
        //     }

        //     if ($i > 10 && $i <= 20) {
        //         $key = strval($i);
        //         $score2 = $score2 + intval($request[$key] ?? 0);
        //     }

        //     if ($i > 20 && $i <= 30) {
        //         $key = strval($i);
        //         $score3 = $score3 + intval($request[$key] ?? 0);
        //     }

        //     if ($i > 30 && $i <= 40) {
        //         $key = strval($i);
        //         $score4 = $score4 + intval($request[$key] ?? 0);
        //     }

        //     if ($i > 40 && $i <= 50) {
        //         $key = strval($i);
        //         $score5 = $score5 + intval($request[$key] ?? 0);
        //     }

        //     if ($i > 50 && $i <= 60) {
        //         $key = strval($i);
        //         $score6 = $score6 + intval($request[$key] ?? 0);
        //     }

        // }

        // insert hasil ke database
        $hasil = HasilMinatKarir::create([
            'test_history_id' => $request->test_history_id,
            'user_id' => Auth::user()->id,
            'test_token' => $request->token,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // insert detail hasil nya sesuai dengan masing-maing score
        // kepribadian 1 - 6
        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil['id'],
            'minat_karir_id' => 1,
            'point' => $score1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil['id'],
            'minat_karir_id' => 2,
            'point' => $score2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil['id'],
            'minat_karir_id' => 3,
            'point' => $score3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil['id'],
            'minat_karir_id' => 4,
            'point' => $score4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil['id'],
            'minat_karir_id' => 5,
            'point' => $score5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil['id'],
            'minat_karir_id' => 6,
            'point' => $score6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // menampilkan hasil test 
        return redirect('/users/minatkarir/result/' . $request['token']);

    }

    public function test()
    {
        $pernyataan = PernyataanMinatKarir::get();
        // $minatkarir = MinatKarir::orderBy('id', 'asc')->get('id');
        $arrayOfJenis = [];

        $temp = [];
        foreach($pernyataan as $item) :
            $temp[strval($item->id)] = $item->minat_karir_id;
        endforeach;
        $arrayOfJenis = $temp;

        return response()->json($arrayOfJenis);

    }

}
