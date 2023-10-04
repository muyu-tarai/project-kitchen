<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/mypage', 'MypageController@mypage')->name('mypage');
Route::post('/mypage', 'MypageController@edit')->name('mypage');



Route::post('/leave_account_complete', 'Leave_account_completeController@delete')->name('leave_account_complete');

Route::post('/leave_account', 'Leave_accountController@leave_account')->name('leave_account');

Route::get('/login/gest', 'GestLoginController@guestLogin')->name('login.guest');