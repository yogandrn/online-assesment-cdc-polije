<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\HasilKepribadian;
use App\Models\PernyataanKepribadian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilKepribadianController extends Controller
{
    public function detail($id)
    {
        $result = HasilKepribadian::where('test_history_id', $id)->with(['kepribadian','user'])->first();
        return view('users.hasil-kepribadian', ['hasil' => $result, ]);
        // return response()->json(['hasil' => $result, ]);
    }

    public function store(Request $request)
    {
        $score = 0;

        $data = $request->all();
        $pernyataan = PernyataanKepribadian::get();

        for ($i=1; $i <= count($pernyataan); $i++) { // iterasi untuk menjumlah score
            $assc = strval($i); 
            $score = $score + intval($request[$assc] ?? 0);
        }

        $tingkat = floatval($score / count($pernyataan) * 100); // hitung jumlah persentase
        if ($tingkat >= 50.00) {
            $kepribadian_id = 1; // jika lebih dari 50%
        } else {
            $kepribadian_id = 2; // jika kurang dari 50%
        }
 
        // insert data hasil tes
        $hasil = HasilKepribadian::create([
            'test_history_id' => $request->test_history_id,
            'user_id' => Auth::user()->id,
            'tingkat' => $tingkat,
            'kepribadian_id' => $kepribadian_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        return redirect('/users/gayakepribadian/result/' . $hasil->id);

    }
}
