<?php
use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index');

Route::get('/store/{id}','ViewController@view');

Route::get('/store_update', 'updateController@store_update')->name('user_update');
Route::post('/store_update', 'updateController@update');
