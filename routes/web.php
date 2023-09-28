<?php

Route::get('/store_update', 'updateController@store_update')->name('user_update');
Route::post('/store_update', 'updateController@update');

Route::get('/store/1','ViewController@view');
Route::post('/store_update', 'updateController@update');
