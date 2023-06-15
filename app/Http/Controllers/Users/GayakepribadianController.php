<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\PernyataanKepribadian;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class GayakepribadianController extends Controller
{

    // method halaman utama menu kepribadian
    public function index()
    {

        // cari history test
        $tesKepribadian = TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Gaya Kepribadian')->orderBy('started_at', 'desc')->first();

        // set default test tidak tersedia untuk user
        $isKepribadianAvailable = 'false';
        $kepribadianAvailableAt = \Carbon\Carbon::now();

        if (!$tesKepribadian) { // jika belum pernah tes
            $isKepribadianAvailable = 'true'; // tes tersedia untuk user
        } else {

            // jika ada history test, dan belum tenggat 90 hari
            if (\Carbon\Carbon::now()->subDays(1) <  $tesKepribadian['started_at']) {
                // test tidak tersedia
                $isKepribadianAvailable = 'false';
                // tampilkan kapan test bisa diakses lagi
                $kepribadianAvailableAt = \Carbon\Carbon::parse($tesKepribadian['started_at'])->addDays(1)->format('d M Y H:i:s');
            
            } else {
                // test tersedia
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
            'token' => $this->createToken(),
            'status' => 'STARTED',
            'started_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // redirect ke halaman test
        return redirect('/users/gayakepribadian/test/' . $test['token']);
    }

    public function createToken() : String
    {
        $token = Str::random(40);
        $check = TestHistory::where('token', $token)->count();
        if ($check > 0) {
            $this->createToken();
        }
        return $token;
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
