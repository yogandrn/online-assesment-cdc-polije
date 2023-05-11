<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KepribadianController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\RegisterController;
use App\Http\Controllers\Users\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index.blade.php');
// });
Route::name('landingpage.')->prefix('/')->group(function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/kepribadian', [KepribadianController::class, 'index']);
});
