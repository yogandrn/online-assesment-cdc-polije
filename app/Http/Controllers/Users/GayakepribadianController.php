<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GayakepribadianController extends Controller
{
    public function index()
    {
        return view('users.gayakepribadian');
    }
}
