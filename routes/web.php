<?php

Auth::routes();

Route::get('/mypage', 'MypageController@mypage');

Route::get('/storeregister', 'StoreRegisterController@storeregister');

Route::post('/storeregister', 'StoreRegisterController@storeregister');

Route::get('/login', 'LoginController@storeregister');

