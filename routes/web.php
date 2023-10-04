<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/mypage', 'MypageController@mypage')->name('mypage');
Route::post('/mypage', 'MypageController@edit')->name('mypage');



Route::post('/leave_account_complete', 'Leave_account_completeController@delete')->name('leave_account_complete');

Route::post('/leave_account', 'Leave_accountController@leave_account')->name('leave_account');

Route::get('/login/gest', 'GestLoginController@guestLogin')->name('login.guest');



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
/******* 動作確認用 *******/
Route::post('/tmp', 'storeRegisterController@update')->name('tmp');

/*** ここから大川さん ***/

Route::get('/store/{id}','ViewController@view');

Route::get('/store_update', 'updateController@store_update')->name('user_update');
Route::post('/store_update', 'updateController@update');
