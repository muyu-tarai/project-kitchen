<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
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

Route::get('/', 'indexController@index')->name('index');
Route::get('/store_register', 'storeRegisterController@storeRegisterDisplay')->name('store_register');
Route::get('/logout', 'LogoutController@logout')->name('logout');


// もしユーザー登録からきたら
Route::post('/store_register_after', 'storeRegisterController@registerOrUpdateJudge')->name('after');


/********
 もしログインから来たら
 ********/
Route::post('/update_store', 'storeRegisterController@registerOrUpdateJudge')->name('update_store');
