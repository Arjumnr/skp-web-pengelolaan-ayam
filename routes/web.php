<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\Ayam\AyamMasukController;
use App\Http\Controllers\Ayam\AyamKeluarController;
use App\Http\Controllers\AyamController;
use App\Http\Controllers\Obat\ObatMasukController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\Pakan\PakanMasukController;
use App\Http\Controllers\Pakan\PakanKeluarController;
use App\Http\Controllers\Pakan\PakanTerpakaiController;


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
//     return view('welcome');
// });

// Route::get('/', 'DashboardController@index')->name('dashboard');
// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authh', [LoginController::class, 'authenticate'])->name('loginPost');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/daftar', [RegisterController::class, 'daftar'])->name('registerPost');
//ayam
// Route::get('/register', [RegisterController::class, 'index'])->name('register');


Route::group(['middleware' => ['auth']], function () {
    // dd(['cekRole:1']);
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['cekRole:1']], function () {
        Route::resource('/akun', AkunController::class);
        Route::resource('/ayam', AyamController::class);
        Route::resource('/pakan', PakanController::class);
        Route::resource('/obatt', ObatController::class);


        //WISATA
        // Route::group(['prefix' => '/wisata'], function () {
        //     Route::get('/', [WisataController::class, 'index'])->name('indexWisata');
        // });

        //USER
        // Route::group(['prefix' => '/user'], function () {
        //     Route::get('/', [UserController::class, 'index'])->name('indexUser');
        //     // Route::get('/users', [UserController::class, 'getDataUser'])->name('getDataUser');
        // });
    });



    Route::group(['middleware' => ['cekRole:2']], function () {
        // Route::get('/ayam-masuk', [AyamController::class, 'indexAyamMasuk'])->name('indexAyamMasuk');
        // USER
        Route::group(['prefix' => '/'], function () {
            // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            Route::resource('/ayam-masuk', AyamMasukController::class);
            Route::resource('/ayam-keluar', AyamKeluarController::class);

            Route::resource('/obat', ObatMasukController::class);


            Route::resource('/pakan-masuk', PakanMasukController::class);
            Route::resource('/pakan-keluar', PakanKeluarController::class);
            Route::resource('/pakan-terpakai', PakanTerpakaiController::class);



          
        });
    });



    // Route::get('/user', [UserController::class, 'index'])->name('indexUser');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::get('/tes', function () {
    echo '<pre>';
    // $user = User::where('person_id', '=', 1);
    // var_dump($user->toArray()); // <---- or toJson()
    //cek session 
    // dd(session()->all());
    echo '</pre>';
});
