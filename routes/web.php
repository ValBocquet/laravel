<?php

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
//     return view('vue1');
// });
Route::get('/', 'WelcomeController@index');
Route::get('photo', 'PhotoController@getForm');
Route::post('photo', 'PhotoController@postForm');