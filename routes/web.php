<?php
<<<<<<< HEAD

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'indexController@index')->name('index');
Route::get('/storeRegister', 'storeRegisterController@storeRegisterDisplay')->name('storeRegister');

/******* 動作確認用 *******/
Route::post('/tmp', 'storeRegisterController@update')->name('tmp');
=======
use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index');

Route::get('/store/{id}','ViewController@view');

Route::get('/store_update', 'updateController@store_update')->name('user_update');
Route::post('/store_update', 'updateController@update');
>>>>>>> b77de2daada5d3eb480bc9f7679624261ee79f4a
