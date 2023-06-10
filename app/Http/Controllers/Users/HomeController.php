<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // halaman beranda user setelah login
    public function index()
    {
        return view('users.index', ['title' => 'Online Asessment Tes CDC Polije']);
    }
}
