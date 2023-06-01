<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\HasilKepribadian;
use App\Models\PernyataanKepribadian;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GayakepribadianController extends Controller
{

    // method halaman utama menu kepribadian
    public function index()
    {
        $tesKepribadian = TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Gaya Kepribadian')->first();
        $isKepribadianAvailable = 'false';
        $kepribadianAvailableAt = \Carbon\Carbon::now();
        if (!$tesKepribadian) {
            $isKepribadianAvailable = 'true';
        } else {
            if (\Carbon\Carbon::now()->subDays(90) <  $tesKepribadian['started_at']) {
                $isKepribadianAvailable = 'false';
                $kepribadianAvailableAt = \Carbon\Carbon::parse($tesKepribadian['started_at'])->addDays(90)->format('d M Y H:i:s');
            } else {
                $isKepribadianAvailable = 'true';
            }
        }
        return view('users.gayakepribadian', ['title' => 'Tes Gaya Kepribadian | CDC Polije','is_available' => $isKepribadianAvailable, 'available_at' => $kepribadianAvailableAt]);
    }

    // method membuat sesi test 
    public function startTest(Request $request)
    {
        // membuat sesi tes baru
        $test = TestHistory::create([
            'user_id' => Auth::user()->id,
            'jenis_test' => 'Gaya Kepribadian',
            'token' => Str::random(40),
            'status' => 'STARTED',
            'started_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // redirect ke halaman test
        return redirect('/users/gayakepribadian/test/' . $test['token']);
    }

    // method untuk menampilkan halaman test
    public function doingTest($token) 
    {

        $data = array();
        $answer = [ // array jawaban
            ['text' => 'Ya', 'point' => 1],
            ['text' => 'Tidak', 'point' => 0],
        ];

        $query = PernyataanKepribadian::get(); // query pernyataan kepribadian

        // input ke array
        foreach ($query as $qst) :
            array_push($data,['id'=> $qst['id'], 'pernyataan' => $qst['pernyataan'], 'answers' => $answer]);
        endforeach;

        // cari token test
        $test = TestHistory::where('token', $token)->first();

        if (!$test) { // jika tidak ada sesi test, redirect paksa
            return redirect()->intended('/users');
        }

        // menampilkan halaman untuk test
        return view('users.test-kepribadian', ['title' => 'Tes Gaya Kepribadian | CDC Polije','questions' => $data,'token' => $token, 'test_id' => $test['id']]);
    }


}
