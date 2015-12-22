<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Password_reset;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
use Redirect;
use Mail;
use View;
use Input;
use Session;
use Carbon\Carbon;


class UserController extends Controller
{
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
//        return view('admin/dash');
        return Redirect::back()->withInput();
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
//        dd($user);
        return view('admin.editUser', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->last_name = $request->input('last_name');
        $user->organization = $request->input('organization');
        $user->reason = $request->input('reason');
//        $user->password = bcrypt($request->input('password'));
        $user->status = $request->input('status');
        $user->save();

        return Redirect::action('Auth\AdminController@dash');
    }


    public function newUser()
    {

        return view('admin.newUser');
    }

    public function createNewUser(Request $request)
    {
        $activation_code = "";

        User::create([
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'organization' => $request->input('organization'),
            'reason' => $request->input('reason'),
            'password' => bcrypt($request->input('password')),
            'activation_code' => $activation_code,
            'status' => 1,
        ]);
        return Redirect::action('Auth\AdminController@dash');
    }

    public function forgotPass() {
        return view('auth.forgotPass');
    }

    public function sendReset(Request $request) {
        $email = $request->input('email');
//        dd($request->input('email'));
        $user = DB::table('users')->where('email', $email)->first();
        if ( ! $user)
        {
            Session::flash('message', 'This email does not exist.');
            return Redirect::back();
        }
//        dd(count($user->id));
        $token = str_random(30);
        $mytime = Carbon::now();
        Password_reset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => $mytime,
        ]);
//        dd($mytime);
        $data = array(
            'token' => $token,
        );

        Mail::send('email.reset', $data, function ($message) use (&$user)  {

            $message->from(env('MAIL_USERNAME'), env('ADMIN_NAME'));

            $message->to($user->email)->subject('Residual Feed Intake Password Rest');

        });

        return view('auth.emailSent');
    }

    public function reset($token) {
//        dd($token);
        $reset = DB::table('password_resets')->where('token', $token)->first();

        if (!$reset)
        {
            Session::flash('message', 'This link is either expired or invalid.');
            return view('auth.login');
        }

        $email = $reset->email;
        $user = DB::table('users')->where('email', $email)->first();
        $id = $user->id;
//        dd($id);

        DB::table('password_resets')->where('token', $token)->delete();

//        dd($email);

        return view('auth.reset', compact('id'));
    }

    public function updatePass(Request $request) {
//        dd($request->input('email'));
//        dd($request->input('password'));
            //update password
        $user = $user = User::find($request->input('id'));
        $user->password = bcrypt($request->input('password'));
        $user->save();
        //send email to notify user
        $data = array(
            'user' => $user,
        );
        Mail::send('email.passwordUpdated', $data, function ($message) use (&$user)  {

            $message->from(env('MAIL_USERNAME'), env('ADMIN_NAME'));

            $message->to($user->email)->subject('Residual Feed Intake Password Has Been Reset');

        });
        return view('auth.login');
    }
}
