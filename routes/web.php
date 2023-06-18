<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KepribadianController;
use App\Http\Controllers\Admin\KarirController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\AdminUserPageController;
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
    Route::group(['middleware' => ['auth', 'user']], function () {
        // Route Minat Karir 
        Route::get('/', [MenuController::class, 'index'])->name('home');
        Route::get('/minatkarir', [MinatkarirController::class, 'index']);
        Route::get('/minatkarir/histories', [HasilMinatKarirController::class, 'history']);
        Route::post('/minatkarir/start', [MinatkarirController::class, 'startTest']);
        Route::get('/minatkarir/test/{token}', [MinatkarirController::class, 'doingTest'])->middleware(['isDoingTest']);
        Route::post('/minatkarir/store', [HasilMinatKarirController::class, 'store']);
        Route::get('/minatkarir/result/{token}', [HasilMinatKarirController::class, 'detail']);
        Route::get('/minatkarir/print/{token}', [HasilMinatKarirController::class, 'printPDF']);

        // Route Gaya Kepribadian 
        Route::get('/gayakepribadian', [GayakepribadianController::class, 'index']);
        Route::get('/gayakepribadian/histories', [HasilKepribadianController::class, 'history']);
        Route::post('/gayakepribadian/start', [GayakepribadianController::class, 'startTest']);
        Route::get('/gayakepribadian/test/{token}', [GayakepribadianController::class, 'doingTest'])->middleware(['isDoingTest']);
        Route::post('/gayakepribadian/store', [HasilKepribadianController::class, 'store']);
        Route::get('/gayakepribadian/result/{token}', [HasilKepribadianController::class, 'detail']);
        Route::get('/gayakepribadian/print/{token}', [HasilKepribadianController::class, 'printPDF']);

        // Route Profile 
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/profile/{id}/edit', [ProfileController::class, 'edit']);
        Route::post('/profile/update/{id}', [ProfileController::class, 'update']);
        Route::post('/profile/{id}/upload/photo', [ProfileController::class, 'uploadFoto']);
        Route::post('/profile/{id}/upload/ijazah', [ProfileController::class, 'uploadIjazah']);
        Route::post('/profile/{id}/upload/ktp', [ProfileController::class, 'uploadKtp']);
    });
});

// Route for Admin 
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('/login', [LoginAdminController::class, 'index']);
    Route::post('/login', [LoginAdminController::class, 'login']);

    Route::group(['middleware' => ['auth-admin', 'admin']], function () {
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
        Route::get('/useredit/{id}', [UserController::class, 'edit']);
        Route::post('/userupdate/{id}', [UserController::class, 'update']);
        Route::post('/userstore', [UserController::class, 'store'])->name("userstore");
        Route::post('/userdestroy/{id}', [UserController::class, 'destroy'])->name("userdestroy");

        Route::post('/logout', [LoginAdminController::class, 'logout']);
    });
});


// cuman nge tes
Route::get('/test', function () {
    return view('users.test');
});
