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


Route::get('advanceQueryForm', ['middleware' => 'auth', 'uses' => 'PagesController@advanceQueryForm']);
Route::post('queryResults', 'PagesController@queryResults');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('register/verify/{activation_ode}', 'Auth\AuthController@confirm');

Route::get('register/approval/{id}', 'Auth\AuthController@approval');
Route::get('admin/dash', ['middleware' => ['auth', 'admin'], 'uses' => 'Auth\AdminController@dash']);









//==========================================================
//---------------- test routes below -----------------------
//==========================================================

get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);


Route::get('approval', function(){

//    dd(Config::get('constants.admin_email'));
    $data = array(
        'id' => 15,
        'email' => "dlcheng@iastate.edu",
        'first_name' => "first",
        'last_name' => "last",
        'organization' => "Iowa state university",
        'reason' => "this hard coded test",
    );


    //send email to administrator
    Mail::send('email.request', $data, function($message) use (&$user) {
        $message->to('dlcheng@iastate.edu', "RFIDB Administrator")
            ->subject('RFIDB: Account registration request');
    });
    return view('auth/approval');
});

Route::get('sendemail', function () {
//    dd(env('MAIL_USERNAME'));
    $data = array(
        'code' => "some_code",
    );

    Mail::send('email.verify', $data, function ($message) {

        $message->from('daolinch@gmail.com', 'Learning Laravel');

        $message->to('dlcheng@iastate.edu')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});