<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PagesController@index');

Route::get('genotyping', 'PagesController@genotyping');
Route::get('carcass', 'PagesController@carcass');
Route::get('carcassForm', 'PagesController@carcassForm');
Route::post('carcassQuery', 'PagesController@carcassQuery');


Route::get('advanceQueryForm', 'PagesController@advanceQueryForm');
Route::post('queryResults', 'PagesController@queryResults');


