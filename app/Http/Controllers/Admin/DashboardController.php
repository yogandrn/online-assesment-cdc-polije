<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestHistory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $umum = User::where('jenis_kandidat', 'Umum')->count();
        $mahasiswa = User::where('jenis_kandidat', 'Mahasiswa Polije')->count();
        $alumni = User::where('jenis_kandidat', 'Alumni Polije')->count();
        $users = [
            'mahasiswa' => $mahasiswa,
            'alumni' => $alumni,
            'umum' => $umum,
        ];
        \Carbon\Carbon::setLocale('id');
        $day1 = TestHistory::where('started_at', 'LIKE', '%' . \Carbon\Carbon::now()->subDays(6)->format('Y-m-d') .'%')->count();
        $day2 = TestHistory::where('started_at', 'LIKE', '%' . \Carbon\Carbon::now()->subDays(5)->format('Y-m-d') .'%')->count();
        $day3 = TestHistory::where('started_at', 'LIKE', '%' . \Carbon\Carbon::now()->subDays(4)->format('Y-m-d') .'%')->count();
        $day4 = TestHistory::where('started_at', 'LIKE', '%' . \Carbon\Carbon::now()->subDays(3)->format('Y-m-d') .'%')->count();
        $day5 = TestHistory::where('started_at', 'LIKE', '%' . \Carbon\Carbon::now()->subDays(2)->format('Y-m-d') .'%')->count();
        $day6 = TestHistory::where('started_at', 'LIKE', '%' . \Carbon\Carbon::now()->subDays(1)->format('Y-m-d') .'%')->count();
        $day7 = TestHistory::where('started_at', 'LIKE', '%' . \Carbon\Carbon::now()->format('Y-m-d') .'%')->count();
        $test = [
            [\Carbon\Carbon::now()->subDays(6)->format('l'), $day1],
            [\Carbon\Carbon::now()->subDays(5)->format('l'), $day2],
            [\Carbon\Carbon::now()->subDays(4)->format('l'), $day3],
            [\Carbon\Carbon::now()->subDays(3)->format('l'), $day4],
            [\Carbon\Carbon::now()->subDays(2)->format('l'), $day5],
            [\Carbon\Carbon::now()->subDays(1)->format('l'), $day6],
            [\Carbon\Carbon::now()->format('l'), $day7],
        ];
        // return response()->json(['title' => $title, 'user' => $users, 'test' => $test ], 200);
        return view('admin.dashboard', ['title' => $title, 'user' => $users, 'test' => $test ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
