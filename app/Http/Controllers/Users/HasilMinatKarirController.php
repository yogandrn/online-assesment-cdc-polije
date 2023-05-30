<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DetailHasilMinatKarir;
use App\Models\HasilMinatKarir;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilMinatKarirController extends Controller
{

    public function detail($id)
    {
        $result = HasilMinatKarir::where('test_history_id', $id)->with(['user'])->first();
        $minatkarir = DetailHasilMinatKarir::where('hasil_minat_karir_id', $result->id)->orderBy('point', 'desc')->limit(2)->get();

        return view('users.hasil-karir', ['test_data' => $result, 'hasil' => $minatkarir]);
        // return response()->json([
        //     'test_data' => $result, 'hasil' => $minatkarir
        // ]);
    }

    public function store(Request $request)
    {
        $score1 = 0;
        $score2 = 0;
        $score3 = 0;
        $score4 = 0;
        $score5 = 0;
        $score6 = 0;

        $data = $request->all();
        for ($i=1; $i <= 60; $i++) { 
            if ($i > 0 && $i <= 10) {
                $assc = strval($i);
                $score1 = $score1 + intval($request[$assc] ?? 0);
            }

            if ($i > 10 && $i <= 20) {
                $assc = strval($i);
                $score2 = $score2 + intval($request[$assc] ?? 0);
            }

            if ($i > 20 && $i <= 30) {
                $assc = strval($i);
                $score3 = $score3 + intval($request[$assc] ?? 0);
            }

            if ($i > 30 && $i <= 40) {
                $assc = strval($i);
                $score4 = $score4 + intval($request[$assc] ?? 0);
            }

            if ($i > 40 && $i <= 50) {
                $assc = strval($i);
                $score5 = $score5 + intval($request[$assc] ?? 0);
            }

            if ($i > 50 && $i <= 60) {
                $assc = strval($i);
                $score6 = $score6 + intval($request[$assc] ?? 0);
            }

        }

        $score = array($score1, $score2, $score3, $score4, $score5, $score6);
        $sorted = rsort($score); 

        $hasil = HasilMinatKarir::create([
            'test_history_id' => $request->test_history_id,
            'user_id' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil->id,
            'minat_karir_id' => 1,
            'point' => $score1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil->id,
            'minat_karir_id' => 2,
            'point' => $score2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil->id,
            'minat_karir_id' => 3,
            'point' => $score3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil->id,
            'minat_karir_id' => 4,
            'point' => $score4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil->id,
            'minat_karir_id' => 5,
            'point' => $score5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DetailHasilMinatKarir::create([
            'hasil_minat_karir_id' => $hasil->id,
            'minat_karir_id' => 6,
            'point' => $score6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $test = TestHistory::find($request->test_history_id);

        return redirect('/users/minatkarir/result/' . $hasil->id);

    }


}
