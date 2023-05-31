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
use App\Http\Controllers\Users\HasilKepribadianController;
use App\Http\Controllers\Users\HasilMinatKarirController;
use App\Http\Controllers\Users\MinatkarirController;
use App\Http\Controllers\Users\ProfileController;
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
Route::get('/', [HomeController::class, 'index'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/register/umum', [RegisterController::class, 'umum'])->middleware('guest');
Route::get('/register/polije', [RegisterController::class, 'polije'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


Route::name('users.')->prefix('users')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', [MenuController::class, 'index'])->name('home');
        Route::get('/gayakepribadian', [GayakepribadianController::class, 'index']);
        Route::get('/minatkarir', [MinatkarirController::class, 'index']);
        // Route::get('/minatkarir/start', [MinatkarirController::class, 'start']);
        Route::post('/minatkarir/start', [MinatkarirController::class, 'startTest']);
        Route::get('/minatkarir/test/{token}', [MinatkarirController::class, 'doingTest'])->middleware(['isDoingTest']);
        Route::post('/minatkarir/store', [HasilMinatKarirController::class, 'store']);
        Route::get('/minatkarir/result/{token}', [HasilMinatKarirController::class, 'detail']);
        // Route::get('/gayakepribadian/start', [GayakepribadianController::class, 'start']);
        Route::post('/gayakepribadian/start', [GayakepribadianController::class, 'startTest']);
        Route::get('/gayakepribadian/test/{token}', [GayakepribadianController::class, 'doingTest'])->middleware(['isDoingTest']);
        Route::post('/gayakepribadian/store', [HasilKepribadianController::class, 'store']);
<<<<<<< Updated upstream
        Route::get('/gayakepribadian/result/{id}', [HasilKepribadianController::class, 'detail']);
        Route::get('/profile', [ProfileController::class, 'index']);
=======
        Route::get('/gayakepribadian/result/{token}', [HasilKepribadianController::class, 'detail']);
>>>>>>> Stashed changes
    });
});

// Route for Admin 
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'index']);
    Route::post('/login', [LoginAdminController::class, 'login']);

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/kepribadian', [KepribadianController::class, 'index'])->name("kepribadian");
        Route::post('/kepribadianupdate/{id}', [KepribadianController::class, 'update'])->name("kepribadianupdate");
        Route::post('/kepribadianstore', [KepribadianController::class, 'store'])->name("kepribadianstore");
        Route::post('/kepribadiandestroy/{id}', [KepribadianController::class, 'hapus'])->name("kepribadiandestroy");

        Route::post('/minatkarirstore', [KarirController::class, 'store']);
        Route::post('/minatkarirupdate/{id}', [KarirController::class, 'update']);
        Route::post('/minatkarirdestroy/{id}', [KarirController::class, 'destroy']);

        Route::get('/karir/realistic', [KarirController::class, 'realistic']);
        Route::get('/karir/investigative', [KarirController::class, 'investigative']);
        Route::get('/karir/artistic', [KarirController::class, 'artistic']);
        Route::get('/karir/social', [KarirController::class, 'social']);
        Route::get('/karir/enterprising', [KarirController::class, 'enterprising']);
        Route::get('/karir/conventional', [KarirController::class, 'conventional']);

        Route::get('/user', [UserController::class, 'index']);
        Route::get('/logout', [LoginAdminController::class, 'logout']);
    });
});


// cuman nge tes
Route::get('/test', function () {
    return view('users.test');
});
