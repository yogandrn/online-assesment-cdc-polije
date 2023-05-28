<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KepribadianController;
use App\Http\Controllers\Admin\KarirController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\RegisterController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\MenuController;
use App\Http\Controllers\Users\GayakepribadianController;
use App\Http\Controllers\Users\HasilMinatKarirController;
use App\Http\Controllers\Users\MinatkarirController;
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
// Route::name('landingpage.')->prefix('/')->group(function(){
//     Route::get('/', [HomeController::class, 'index']);
//     Route::get('/login', [LoginController::class, 'index']);
//     Route::get('/register', [RegisterController::class, 'index']);
// });

// Route for User 
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::name('users.')->prefix('users')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', [MenuController::class, 'index']);
        Route::get('/gayakepribadian', [GayakepribadianController::class, 'index']);
        Route::get('/minatkarir', [MinatkarirController::class, 'index']);
        Route::get('/minatkarir/start', [MinatkarirController::class, 'start']);
        Route::get('/minatkarir/test', [MinatkarirController::class, 'doingTest']);
        Route::post('/minatkarir/store', [HasilMinatKarirController::class, 'store']);
        Route::get('/minatkarir/result/{id}', [HasilMinatKarirController::class, 'detail']);
    });
});

// Route for Admin 
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'index']);
    Route::post('/login', [LoginAdminController::class, 'login']);

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/kepribadian', [KepribadianController::class, 'index']);
        Route::get('/karir', [KarirController::class, 'index']);
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/logout', [LoginAdminController::class, 'logout']);
    });
});


// cuman nge tes
Route::get('/test', function() {
    return view('users.test');
});