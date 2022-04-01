<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Global middleware
Route::get('/checkPass', function () {
    return view('testMiddleware/global-mid/checkPass');
});
Route::post('/checkPass', function () {
    return view('testMiddleware/global-mid/unsecure');
});
Route::view('/secure','testMiddleware/global-mid/secure');


//Group middleware
Route::group(['middleware'=>['groupCheckPass']],function () {
    Route::view('g1','testMiddleware/group-mid/g1');
    Route::view('g2','testMiddleware/group-mid/g2');
});

//Routed Middleware
Route::view('r1','testMiddleware/routed-mid/r1')->middleware('r1');
Route::view('noAccess','testMiddleware/noAccess');