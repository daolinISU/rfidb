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



Route::get('approval', function(){
    $data = array(
        'id' => $user->id,
        'email' => $user->email,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'organization' => $user->organization,
        'reason' => $user->reason,
    );


    //send email to administrator
    Mail::send('email.request', $data, function($message) use (&$user) {
        $message->to('dlcheng@iastate.edu', "RFIDB Administrator")
            ->subject('RFIDB: Account registration request');
    });
    return "new account has be actovated";
});

Route::get('sendemail', function () {

    $data = array(
        'code' => "some_code",
    );

    Mail::send('email.verify', $data, function ($message) {

        $message->from('daolinch@gmail.com', 'Learning Laravel');

        $message->to('dlcheng@iastate.edu')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});