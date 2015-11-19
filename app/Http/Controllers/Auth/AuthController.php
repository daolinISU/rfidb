<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;



    protected $redirectPath = '/';

    protected $loginPath = '/auth/login';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'organization' => 'required|min:3|max:255',
            'reason' => 'required|min:3|max:1000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'organization' => $data['organization'],
            'reason' => $data['reason'],
        ]);
    }


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function confirm($activation_code)
    {
        if( ! $activation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::where('activation_code', $activation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->activation_code = "";
        $user->save();


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
            $message->to($user->email, $user->first_name." ".$user->last_name)
                ->subject('RFIDB: Account registration request');
        });


        return view('Auth/confirm');
    }


    public function approval($id)
    {


        $user = User::where('id', $id)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->status = 1;
        $user->save();


        $data = array(
            'id' => $user->id,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'organization' => $user->organization,
            'reason' => $user->reason,
        );


        //send email to administrator
        Mail::send('email.activated', $data, function($message) use (&$user) {
            $message->to($user->email, $user->first_name." ".$user->last_name)
                ->subject('RFIDB: Account application approved');
        });


        return view('admin/dash');
    }



}
