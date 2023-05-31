<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\PernyataanKepribadian;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GayakepribadianController extends Controller
{
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

    public function start()
    {
        return view('users.start', ['title' => 'Gaya Kepribadian', 'route' => '/users/gayakepribadian/start']);
    }

    public function startTest(Request $request)
    {
        $test = TestHistory::create([
            'user_id' => Auth::user()->id,
            'jenis_test' => 'Gaya Kepribadian',
            'token' => Str::random(40),
            'status' => 'STARTED',
            'started_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // $request->session()->put('test', $test->token);

        return redirect('/users/gayakepribadian/test/' . $test['token']);
    }

    public function doingTest($token)
    {
                //create test session
        // $test = TestHistory::create([
        //     'user_id' => Auth::user()->id,
        //     'jenis_test' => 'Gaya Kepribadian',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

       
        //     $request->session()->put('isDoingTest', True);
        

        $data = array();
        $answer = [
            ['text' => 'Ya', 'point' => 1],
            ['text' => 'Tidak', 'point' => 0],
        ];
        $query = PernyataanKepribadian::get();
        
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
            array_push($data,['id'=> $qst['id'], 'pernyataan' => $qst['pernyataan'], 'answers' => $answer]);
        endforeach;
        // dd($data);
        $test = TestHistory::where('token', $token)->first();
        if (!$test) {
            return redirect()->intended('/users');
        }
        return view('users.test-kepribadian', ['title' => 'Tes Gaya Kepribadian | CDC Polije','questions' => $data,'token' => $token, 'test_id' => $test['id']]);
    }
}
