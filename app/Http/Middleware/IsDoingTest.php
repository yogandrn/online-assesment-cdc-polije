<?php

namespace App\Http\Middleware;

use App\Models\TestHistory;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDoingTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $test = TestHistory::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first(); //cari history test terkini

        if (!$test) { // jika tidak ada
            return redirect('/users');
        }
        
        if ($test['status'] == 'FINISHED') { //jika tes nya sudah selesai
            return redirect('/users');
        }

        return $next($request); // handle next request 

    }
}
