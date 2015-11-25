<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
        $user->role = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->organization = $request->input('organization');
        $user->reason = $request->input('reason');
        $user->password = bcrypt($request->input('password'));
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


}
