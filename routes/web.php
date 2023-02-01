<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AyamController;


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
//ayam
// Route::get('/register', [RegisterController::class, 'index'])->name('register');


Route::group(['middleware' => ['auth']], function () {
    // dd(['cekRole:1']);
    Route::group(['middleware' => ['cekRole:1']], function () {
        // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            // Route::get('/ayam-masuk', [AyamController::class, 'indexAyamMasuk'])->name('indexAyamMasuk');
            Route::resource('/ayam-masuk', AyamController::class);
            //show
            // Route::get('/ayam-masuk/show/{id}', [AyamController::class, 'showAyamMasuk'])->name('showAyamMasuk');
            //save
            // Route::post('/ayam-masuk/store', [AyamController::class, 'storeAyamMasuk'])->name('storeAyamMasuk');
            // //update
            // Route::put('/ayam-masuk/update/{id}', [AyamController::class, 'updateAyamMasuk'])->name('updateAyamMasuk');
            // //delete
            // Route::delete('/ayam-masuk/delete/{id}', [AyamController::class, 'deleteAyamMasuk'])->name('deleteAyamMasuk');

            Route::get('/ayam-keluar', [AyamController::class, 'indexAyamKeluar'])->name('indexAyamKeluar');
            // Route::get('/users', [UserController::class, 'getDataUser'])->name('getDataUser');
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
