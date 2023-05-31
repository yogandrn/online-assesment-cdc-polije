<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('users.index', ['title' => 'Online Asessment Tes CDC Polije']);
    }
}
