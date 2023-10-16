<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//店舗一覧画面
Route::get('/', 'IndexController@index')->name('index');
//店舗詳細画面
Route::get('/store/{id}','ViewController@view');
//ゲストログイン
Route::get('/login/gest', 'GestLoginController@guestLogin')->name('login.guest');

//ログインが必要なところ
Route::group(['middleware' => 'auth'], function() {
//ログアウト
Route::get('/logout', 'LogoutController@logout')->name('logout');
//マイページへのリンクと更新用
Route::get('/mypage', 'MypageController@mypage')->name('mypage');
Route::post('/mypage', 'MypageController@edit')->name('mypage');
//退会処理
Route::post('/leave_account', 'Leave_accountController@leave_account')->name('leave_account');
Route::post('/leave_account_complete', 'Leave_account_completeController@delete')->name('leave_account_complete');
Route::get('/leave_account_complete', 'Leave_account_completeController@leave_account_complete')->name('leave_account_complete');

//詳細登録画面
Route::get('/store_register', 'storeRegisterController@storeRegisterDisplay')->name('store_register');
Route::post('/store_register_after', 'storeRegisterController@registerOrUpdateJudge')->name('after');
Route::post('/update_store', 'storeRegisterController@registerOrUpdateJudge')->name('update_store');
Route::post('/tmp', 'storeRegisterController@update')->name('tmp');
//リアルタイム更新画面
Route::get('/store_update', 'updateController@store_update')->name('user_update');
Route::post('/store_update', 'updateController@update');
});