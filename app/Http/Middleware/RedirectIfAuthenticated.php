<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
  {
    //adding switch statement for the guard value
    switch($guard){
      //if the guard value is admin
        case 'admin':
        //check authentication
            if (Auth::guard($guard)->check()) {
              //return to the dashboard route
                return redirect('/admin');
            }
            break;
        default:

            if (Auth::guard($guard)->check()) {
                return redirect('/');
            }
            break;
    }
    return $next($request);
}
}
