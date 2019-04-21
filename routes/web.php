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

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('test', 'MainController@test');

Route::get('testh1', 'MainController@testh1');


Route::get('links', 'MainController@all_links');


// Start parser. Secret token need for start parser via cron.
//Route::get('start-parser/{token}', 'ParserController@start')->name('parser.start');