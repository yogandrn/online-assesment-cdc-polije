<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('users.profile', ['title' => 'Profil Saya | CDC Polije', 'user' => $user]);
    }
}
