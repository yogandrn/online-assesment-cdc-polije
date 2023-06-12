<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\PernyataanMinatKarir;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class MinatkarirController extends Controller
{

    // halaman menu tes minat karir
    public function index()
    {
        $cacheKey = 'history-minatkarir';
        $cacheTime = 30;

        // cari history test
        $tesMinatKarir = Cache::remember($cacheKey, $cacheTime, function () {
            return TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Minat Karir')->orderBy('started_at', 'desc')->first();
        });
        
        // set default test tidak tersedia untuk user
        $isMinatKarirAvailable = 'false'; 
        $minatkarirAvailableAt = \Carbon\Carbon::now();

        
        if (!$tesMinatKarir) { // jika belum pernah tes
            $isMinatKarirAvailable = 'true'; // tes tersedia untuk user
        } else {

            // jika ada history test, dan belum tenggat 90 hari
            if (\Carbon\Carbon::now()->subDays(1) <  $tesMinatKarir['started_at']) {
                // test tidak tersedia
                $isMinatKarirAvailable = 'false';
                // tampilkan kapan test bisa diakses lagi
                $minatkarirAvailableAt = \Carbon\Carbon::parse($tesMinatKarir['started_at'])->addDays(1)->format('d M Y H:i:s'); 

            } else {
                // test tersedia
                $isMinatKarirAvailable = 'true';
            }
        }
        return view('users.minatkarir', ['title' => 'Tes Minat Karir | CDC Polije','is_available' => $isMinatKarirAvailable, 'available_at' => $minatkarirAvailableAt]);
    }

    
    // public function start()
    // {
    //     return view('users.start', ['title' => 'Minat Karir', 'route' => '/users/minatkarir/start']);
        
    //     // return redirect('/minatkarir/test/' . $test->id);
    // }

    // method untuk membuat sesi test 
    public function startTest(Request $request)
    {
        // buat history test 
        $test = TestHistory::create([
            'user_id' => Auth::user()->id,
            'jenis_test' => 'Minat Karir',
            'token' => $this->createToken(),
            'status' => 'STARTED',
            'started_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // tampilkan halaman test
        return redirect('/users/minatkarir/test/' . $test->token);
    }

    // method untuk generate unique token
    public function createToken() : String
    {
        $token = Str::random(40);
        $check = TestHistory::where('token', $token)->count();
        if ($check > 0) {
            $this->createToken();
        }
        return $token;
    }

    // menampilkan data pernyataan dan jawaban di halaman test
    public function doingTest($token)
    {
        $data = array(); // array kosong
        // array untuk opsi jawaban
        $answer = [
            ['text' => 'Ya', 'point' => 1],
            ['text' => 'Tidak', 'point' => 0],
        ];

        $query = PernyataanMinatKarir::get(); // ambil data pernyataan

        // masukkan data pernyataan ke dalam array
        foreach ($query as $qst) :
            array_push($data,['id'=> $qst['id'], 'pernyataan' => $qst['pernyataan'], 'type' => $qst['minat_karir_id'], 'answers' => $answer]);
        endforeach;

        // cari apakah ada test dengan token yang di minta
        $test = TestHistory::where('token', $token)->first();
        if (!$test) { // jika tidak, redirect ke home
            return redirect()->intended('/users');
        }

        // menampilkan halaman test
        return view('users.test-minat', ['title' => 'Tes Minat Karir | CDC Polije','questions' => $data, 'token' => $token, 'test_id' => $test->id]);
    }


}
