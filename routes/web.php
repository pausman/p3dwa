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
# for the main page just put up the page. NO controller needed
Route::view('/', 'index');

# routes for the Caesar Cipher
Route::get('/caesar/encodeCipher','CipherController@encodeCipher');
Route::get('/caesar/encode-process','CipherController@encodeprocess');

# routes for the Rail Cipher
Route::get('/rail/encodeRail','RailController@encodeRailCipher');
Route::get('/rail/encode-process','RailController@encodeRailProcess');

# route for practice  and testing
Route::any('/practice/{n?}', 'PracticeController@index');