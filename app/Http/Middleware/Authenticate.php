<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        if ($this->auth->user()->activation_code !== "") {
            Session::flash('message', 'Your email address hasn\'t been confirmed, please check your activation email.');
            return redirect('/');
        }

        if ($this->auth->user()->status === 0) {
            Session::flash('message', 'Your account hasn\'t been activated, please try again later.');
            return redirect('/');
        }


        return $next($request);
    }
}
