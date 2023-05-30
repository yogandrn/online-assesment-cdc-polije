<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\PernyataanKepribadian;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GayakepribadianController extends Controller
{
    public function index()
    {
        return view('users.gayakepribadian');
    }

    public function start()
    {
        return view('users.start', ['title' => 'Gaya Kepribadian', 'route' => '/users/gayakepribadian/test']);
    }

    public function doingTest()
    {
                //create test session
        $test = TestHistory::create([
            'user_id' => Auth::user()->id,
            'jenis_test' => 'Gaya Kepribadian',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data = array();
        $answer = [
            ['text' => 'Ya', 'point' => 1],
            ['text' => 'Tidak', 'point' => 0],
        ];
        $query = PernyataanKepribadian::get();
        $realistic = array();
        $investigative = array();
        $artistic = array();
        $social = array();
        $enterprise = array();
        $conventional = array();
        
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
        return view('users.test-kepribadian', ['questions' => $data, 'test_id' => $test->id]);
    }
}
