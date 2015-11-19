<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Admin {

    public function handle($request, Closure $next)
    {

        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }

        Session::flash('message', 'You need to be an administrator to visit this page.');

        return redirect('/');

    }

}
