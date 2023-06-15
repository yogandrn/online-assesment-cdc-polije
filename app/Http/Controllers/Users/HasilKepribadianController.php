<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\HasilKepribadian;
use App\Models\PernyataanKepribadian;
use App\Models\TestHistory;
// use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Cache;

class HasilKepribadianController extends Controller
{

    // method menampilkan history test user
    public function history()
    {   
        $cacheKey = 'history-gayakepribadian';
        $cacheTime = 30;

        $result = Cache::remember($cacheKey, $cacheTime, function () {
            return HasilKepribadian::where('user_id', Auth::user()->id)->with([ 'test', 'kepribadian'])->orderBy('created_at', 'desc')->paginate(10);
        });

        for ($i = 0; $i < count($result); $i++) {
            $startedAt = \Carbon\Carbon::parse($result[$i]['test']['started_at']);
            $finishedAt = \Carbon\Carbon::parse($result[$i]['test']['finished_at']);
        
            $durasisec = $startedAt->diffInSeconds($finishedAt); // ambil data durasi test dalam detik
            $durasimin = $startedAt->diffInMinutes($finishedAt); // ambil data durasi test dalam menit
            $result[$i]['durasi_test'] = $durasimin . 'mnt ' . $durasisec % 60 . 'dtk' ; // 
        } 
        
        return view('users.riwayat-kepribadian', ['title' => 'Riwayat Tes Gaya Kepribadian | CDC Polije', 'hasil' => $result]);
    }
    
    // method untuk menampilkan detail hasil test
    public function detail($token)
    {
        $result = HasilKepribadian::where('test_token', $token)->with(['kepribadian','user', 'test'])->first(); // ambil data hasil test

        $startedAt = \Carbon\Carbon::parse($result->test->started_at);
        $finishedAt = \Carbon\Carbon::parse($result->test->finished_at);

        $durasisec = $startedAt->diffInSeconds($finishedAt); // ambil data durasi test dalam detik
        $durasimin = $startedAt->diffInMinutes($finishedAt); // ambil data durasi test dalam menit
        $result['durasi_test'] = $durasimin . ' menit ' . $durasisec % 60 . ' detik'; // data durasi

        return view('users.hasil-kepribadian', ['hasil' => $result, 'title' => 'Hasil Tes Gaya Kepribadian | CDC Polije', 'durasi' => $durasisec]);
        // return response()->json( ['hasil' => $result, 'title' => 'Hasil Tes Gaya Kepribadian | CDC Polije', ]);
    }
    
    public function printPDF($token)
    {
        $result = HasilKepribadian::where('test_token', $token)->with(['kepribadian','user', 'test'])->first(); // ambil data hasil test
    
        $startedAt = \Carbon\Carbon::parse($result->test->started_at);
        $finishedAt = \Carbon\Carbon::parse($result->test->finished_at);
    
        $durasisec = $startedAt->diffInSeconds($finishedAt); // ambil data durasi test dalam detik
        $durasimin = $startedAt->diffInMinutes($finishedAt); // ambil data durasi test dalam menit
        $result['durasi_test'] = $durasimin . ' menit ' . $durasisec % 60 . ' detik'; // data durasi
    
        // Pdf::setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => TRUE, 'enable_javascript' => TRUE]);
        // $pdf = new Dompdf();
        // $html = view('users.cetak-kepribadian', ['hasil' => $result, 'title' => 'Hasil Tes Gaya Kepribadian | CDC Polije',])->render();
        // $pdf->loadHtml($html);
        // $pdf->render();
        // $pdf = PDF::loadView('users.cetak-kepribadian', ['hasil' => $result, 'title' => 'Hasil Tes Gaya Kepribadian | CDC Polije',])->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true,]);
        // return $pdf->download(uniqid(). '.pdf');
        return view('users.cetak-kepribadian', ['hasil' => $result, 'title' => 'Hasil Tes Gaya Kepribadian | CDC Polije',]);
       
    }

    // method untuk menghitung hasil test dan menyimpan ke database
    public function store(Request $request)
    {
        $score = 0; 

        // cari test history lalu ubah status nya menjadi selesai
        TestHistory::where('id', $request->test_history_id)->update([
            'status' => 'FINISHED',
            'finished_at' => now(),
            'updated_at' => now(),
        ]);

        $data = $request->all(); // ambil semua jawaban dari request
        $pernyataan = PernyataanKepribadian::get(); // query mengambil data pernyataan

        for ($i=1; $i <= count($pernyataan); $i++) { // iterasi untuk menjumlah score
            $assc = strval($i); 
            $score = $score + intval($data[$assc] ?? 0);
        }

        $tingkat = floatval(($score / count($pernyataan)) * 100); // hitung jumlah persentase
        if ($tingkat >= 50.00) {
            $kepribadian_id = 1; // jika lebih dari 50%
        } else {
            $kepribadian_id = 2; // jika kurang dari 50%
        }
 
        // insert data hasil tes
        $hasil = HasilKepribadian::create([
            'test_history_id' => $request->test_history_id,
            'test_token' => $request->token,
            'user_id' => Auth::user()->id,
            'tingkat' => $tingkat,
            'kepribadian_id' => $kepribadian_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // redirect ke halaman hasil test
        return redirect('/users/gayakepribadian/result/' . $request->token);

    }
}
