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
Route::get('wait', 'PagesController@notdone');

Route::get('genotyping', 'PagesController@genotyping');
Route::get('carcass', 'PagesController@carcass');
Route::get('carcassForm', 'PagesController@carcassForm');
Route::post('carcassQuery', 'PagesController@carcassQuery');


Route::get('advanceQueryForm', ['middleware' => 'auth', 'uses' => 'PagesController@advanceQueryForm']);
Route::post('queryResults', ['middleware' => 'auth', 'uses' => 'PagesController@@queryResults']);

Route::get('advancedSearch', ['middleware' => 'auth', 'uses' => 'PagesController@advancedSearchForm']);
Route::post('advancedSearch', ['middleware' => 'auth', 'uses' => 'PagesController@sqlQuery']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('password/email', 'Auth\UserController@forgotPass');
Route::post('password/email', 'Auth\UserController@sendReset');
Route::get('password/reset/{token}', 'Auth\UserController@reset');
Route::post('password/reset', 'Auth\UserController@updatePass');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/postRegister', ['middleware' => 'auth', 'uses' => 'PagesController@postRegister']);

Route::get('register/verify/{activation_code}', 'PagesController@confirm');

//update profile
Route::get('auth/profile/{id}', ['middleware' => 'auth', 'uses' => 'PagesController@profile']);
Route::post('auth/{id}/edit', ['middleware' => ['auth'], 'uses' => 'PagesController@update']);
//update password
Route::get('auth/{id}/resetPass', ['middleware' => ['auth'], 'uses' => 'PagesController@getResetPass']);
Route::post('auth/{id}/resetPass', ['middleware' => ['auth'], 'uses' => 'PagesController@resetPass']);


Route::get('register/approval/{id}', 'Auth\AuthController@approval');
Route::get('admin/dash', ['middleware' => ['admin'], 'uses' => 'Auth\AdminController@dash']);

Route::delete('user/{id}/delete', ['middleware' => ['admin'], 'uses' => 'Auth\UserController@destroy']);

Route::get('user/{id}/edit', ['middleware' => ['admin'], 'uses' => 'Auth\UserController@edit']);
Route::post('user/{id}/edit', ['middleware' => ['admin'], 'uses' => 'Auth\UserController@update']);


Route::get('user/create', ['middleware' => ['admin'], 'uses' => 'Auth\UserController@newUser']);
// Route::post('user/create', ['middleware' => ['admin'], 'uses' => 'Auth\UserController@createNewUser']);

Route::post('user/create', 'Auth\UserController@createNewUser');



//browse database
Route::get('database', ['middleware' => ['auth'], 'uses' => 'PagesController@showDatabase']);
Route::post('database', ['middleware' => ['auth'], 'uses' => 'PagesController@showTable']);
//Route::get('browser', ['middleware' => ['auth'], 'uses' => 'PagesController@showTable']);
Route::post('browseTable', ['middleware' => ['auth'], 'uses' => 'PagesController@getAttr']);
Route::post('browseResult', ['middleware' => ['auth'], 'uses' => 'PagesController@getResult']);

Route::get('pdf', function(){
    $filename = '/../resources/pdf/tables.pdf';
    $path = storage_path().DIRECTORY_SEPARATOR.$filename;

    return Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; '.$filename,
    ]);
});


Route::get('contact', function(){
    return view('pages.contact');
});





//==========================================================
//---------------- test routes below -----------------------
//==========================================================

/*Route::get('browser', 'PagesController@showTable');
Route::post('browseTable', 'PagesController@getAttr');
Route::post('browseResult', 'PagesController@getResult');*/
get('exportTest', function(){
   return view('pages/exportTest');
});

get('protected', ['middleware' => ['admin'], function() {
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