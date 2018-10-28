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

Route::get('/', 'CipherController@index');
Route::get('/caesar/encodeCipher','CipherController@encodeCipher');
Route::get('/caesar/encode-process','CipherController@encodeprocess');

Route::get('/encodeCipher','CipherController@encodeCipher');
Route::get('/shiftDirection', 'CipherController@neutralizeShiftDirection');
Route::get('/decodeCipher','CipherController@decodeCipher');
Route::get('/encodeRail','RailController@encodeRailCipher');
Route::get('/decodeRail/{ciphertext}/{key}', 'RailController@decodRailCipher');


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');