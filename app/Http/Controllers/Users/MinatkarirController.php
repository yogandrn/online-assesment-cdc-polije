<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\HasilMinatKarir;
use App\Models\MinatKarir;
use App\Models\PernyataanMinatKarir;
use App\Models\Question;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MinatkarirController extends Controller
{

    public function index()
    {
        $tesMinatKarir = TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Minat Karir')->first();
        $isMinatKarirAvailable = 'false';
        $minatkarirAvailableAt = \Carbon\Carbon::now();
        if (!$tesMinatKarir) {
            $isMinatKarirAvailable = 'true';
        } else {
            if (\Carbon\Carbon::now()->subDays(90) <  $tesMinatKarir['started_at']) {
                $isMinatKarirAvailable = 'false';
                $minatkarirAvailableAt = \Carbon\Carbon::parse($tesMinatKarir['started_at'])->addDays(90)->format('d M Y H:i:s');
            } else {
                $isMinatKarirAvailable = 'true';
            }
        }
        return view('users.minatkarir', ['title' => 'Tes Minat Karir | CDC Polije','is_available' => $isMinatKarirAvailable, 'available_at' => $minatkarirAvailableAt]);
    }

    public function start()
    {
        return view('users.start', ['title' => 'Minat Karir', 'route' => '/users/minatkarir/start']);
        
        // return redirect('/minatkarir/test/' . $test->id);
    }

    public function startTest(Request $request)
    {
        $test = TestHistory::create([
            'user_id' => Auth::user()->id,
            'jenis_test' => 'Minat Karir',
            'token' => $this->createToken(),
            'status' => 'STARTED',
            'started_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // $request->session()->put('test', $test->token);

        return redirect('/users/minatkarir/test/' . $test->token);
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
    
    public function doingTest($token)
    {
        
        //create test session
        // $test = TestHistory::create([
        //     'user_id' => Auth::user()->id,
        //     'jenis_test' => 'Minat Karir',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        $data = array();
        $answer = [
            ['text' => 'Ya', 'point' => 1],
            ['text' => 'Tidak', 'point' => 0],
        ];
        $query = PernyataanMinatKarir::get();
        $realistic = array();
        $investigative = array();
        $artistic = array();
        $social = array();
        $enterprise = array();
        $conventional = array();
        $query1 = PernyataanMinatKarir::where('minat_karir_id', '1')->get();
        $query2 = PernyataanMinatKarir::where('minat_karir_id', '2')->get();
        $query3 = PernyataanMinatKarir::where('minat_karir_id', '3')->get();
        $query4 = PernyataanMinatKarir::where('minat_karir_id', '4')->get();
        $query5 = PernyataanMinatKarir::where('minat_karir_id', '5')->get();
        $query6 = PernyataanMinatKarir::where('minat_karir_id', '6')->get();
        
        // foreach ($query1 as $item) :
        //     array_push($realistic, ['pernyataan' => $item['pernyataan'], 'answers' => $answer]);
        // endforeach;
        // foreach ($query2 as $item) :
        //     array_push($investigative, ['pernyataan' => $item['pernyataan'], 'answers' => $answer]);
        // endforeach;
        // foreach ($query3 as $item) :
        //     array_push($artistic, ['pernyataan' => $item['pernyataan'], 'answers' => $answer]);
        // endforeach;
        // foreach ($query4 as $item) :
        //     array_push($social, ['pernyataan' => $item['pernyataan'], 'answers' => $answer]);
        // endforeach;
        // foreach ($query5 as $item) :
        //     array_push($enterprise, ['pernyataan' => $item['pernyataan'], 'answers' => $answer]);
        // endforeach;
        // foreach ($query6 as $item) :
        //     array_push($conventional, ['pernyataan' => $item['pernyataan'], 'answers' => $answer]);
        // endforeach;

        // array_push($data, $realistic, $investigative, $artistic, $social, $enterprise, $conventional);

        foreach ($query as $qst) :
            array_push($data,['id'=> $qst['id'], 'pernyataan' => $qst['pernyataan'], 'type' => $qst['minat_karir_id'], 'answers' => $answer]);
        endforeach;
        
        $test = TestHistory::where('token', $token)->first();
        if (!$test) {
            return redirect()->intended('/users');
        }

        return view('users.test-minat', ['title' => 'Tes Minat Karir | CDC Polije','questions' => $data, 'token' => $token, 'test_id' => $test->id]);
    }


}
