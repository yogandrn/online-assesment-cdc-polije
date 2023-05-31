<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        return view('users.home', ['title' => 'Beranda | CDC Polije']);
    }
}
