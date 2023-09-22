<?php

Route::get('/store_update', 'updateController@store_update')->name('user_update');
Route::post('/store_update', 'updateController@update');