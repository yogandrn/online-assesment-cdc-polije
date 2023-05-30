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
        $tesKepribadian = TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Gaya Kepribadian')->first();
        $tesMinatKarir = TestHistory::where('user_id', Auth::user()->id)->where('jenis_test', 'Minat Karir')->first();


        $isMinatKarirAvailable = false;
        $isKepribadianAvailable = false;
        $kepribadianAvailableAt = \Carbon\Carbon::now();
        $minatkarirAvailableAt = \Carbon\Carbon::now();
        if (!$tesKepribadian) {
            $isKepribadianAvailable = true;
        } elseif(!$tesMinatKarir) {
            $isMinatKarirAvailable = true;
        } else {
            if (\Carbon\Carbon::now()->subDays(90) <  $tesKepribadian['created_at']) {
                $isKepribadianAvailable = false;
                $kepribadianAvailableAt = \Carbon\Carbon::parse($tesKepribadian['created_at'])->addDays(90);
            } 
            $isKepribadianAvailable = true;

            if (\Carbon\Carbon::now()->subDays(90) <  $tesMinatKarir['created_at']) {
                $isMinatKarirAvailable = false;
                $minatkarirAvailableAt = \Carbon\Carbon::parse($tesMinatKarir['created_at'])->addDays(90);
            }
            $isMinatKarirAvailable = true;
        }


        return view('users.home', 
        [
            'is_minat_karir_available' => $isMinatKarirAvailable, 
            'minat_karir_available_at' => $minatkarirAvailableAt , 
            'is_kepribadian_available' => $isKepribadianAvailable, 
            'kepribadian_available_at' => $kepribadianAvailableAt
        ]
    );
    }
}
