<?php

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

Route::get('/', 'uploadImageController@index')->name('index');

Route::post('/upload', 'uploadImageController@store')->name('store');
//Rotate Image
Route::get('/flip', 'uploadImageController@flip')->name('flip');
Route::get('/brightness', 'uploadImageController@brightness')->name('brightness');
Route::get('/darkness', 'uploadImageController@darkness')->name('darkness');
Route::get('/contrast', 'uploadImageController@contrast')->name('contrast');
Route::get('/default', 'uploadImageController@default')->name('default');
Route::get('/blur', 'uploadImageController@blur')->name('blur');

