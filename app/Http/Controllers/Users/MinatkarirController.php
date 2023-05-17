<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
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
        $questions = Question::where('id_kuisioner', '1')->with(['answers'])->get();
        return view('users.quiz', ['questions' => $questions]);
    }
}
