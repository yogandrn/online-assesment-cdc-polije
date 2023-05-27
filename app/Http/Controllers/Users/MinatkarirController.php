<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\PernyataanMinatKarir;
use App\Models\Question;
use Illuminate\Http\Request;

class MinatkarirController extends Controller
{
    public function index()
    {
        return view('users.minatkarir');
    }

    public function start(Request $request)
    {
        $data = array();
        $answer = [
            ['text' => 'Ya', 'point' => 1],
            ['text' => 'Tidak', 'point' => 0],
        ];
        $query = PernyataanMinatKarir::orderBy('id', 'asc')->limit(20)->get();
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
            array_push($data,['pernyataan' => $qst['pernyataan'], 'type' => $qst['minat_karir_id'], 'answers' => $answer]);
        endforeach;
        return view('users.quiz', ['questions' => $data]);
    }
}
