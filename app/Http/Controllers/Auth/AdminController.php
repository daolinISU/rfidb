<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;
use DB;


class AdminController extends Controller
{


    public function dash()
    {
        $query = DB::table('users');
        $results = $query->get();
        //dd($results);

        return view('admin/dash', compact('results'));
    }



}
