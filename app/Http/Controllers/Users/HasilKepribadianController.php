<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\HasilKepribadian;
use App\Models\PernyataanKepribadian;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilKepribadianController extends Controller
{

    // method menampilkan history test user
    public function history()
    {   
        $result = HasilKepribadian::where('user_id', Auth::user()->id)->with([ 'test', 'kepribadian'])->paginate(10);
        // if (!$result) {
        //     $result = [];
        // } 
        return view('users.riwayat-kepribadian', ['title' => 'Riwayat Tes Gaya Kepribadian | CDC Polije', 'hasil' => $result]);
        // return response()->json(['riwayat' => $result]);
    }
    
    public function detail($token)
    {
        $result = HasilKepribadian::where('test_token', $token)->with(['kepribadian','user'])->first();
        return view('users.hasil-kepribadian', ['hasil' => $result, 'title' => 'Hasil Tes Gaya Kepribadian | CDC Polije']);
        // return response()->json(['hasil' => $result, ]);
    }

    public function store(Request $request)
    {
        $score = 0;

        TestHistory::where('id', $request->test_history_id)->update([
            'status' => 'FINISHED',
            'finished_at' => now(),
            'updated_at' => now(),
        ]);

        $data = $request->all();
        $pernyataan = PernyataanKepribadian::get();

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
        

        return redirect('/users/gayakepribadian/result/' . $request->token);

    }
}
