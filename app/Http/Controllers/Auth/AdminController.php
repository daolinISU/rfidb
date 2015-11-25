<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;


class AdminController extends Controller
{


    public function dash()
    {
        $users = DB::table('users')
                    ->orderBy('role')
                    ->orderBy('last_name')
                    ->orderBy('first_name')
                    ->get();
//        dd($users);

        return view('admin/dash', compact('users'));
    }



}
