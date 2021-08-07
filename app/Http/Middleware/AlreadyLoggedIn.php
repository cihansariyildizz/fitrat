<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //Already logged in
        if(session()->has("LoggedUser") && (url('login') == $request -> url() || url('register') == $request->url() ) ){
            return back();
        }
        //Already not logged in
        if( !(session()->has('LoggedUser')) &&  (url('planner') == $request->url() ||  url('foodform') == $request->url() || url('welcoming') == $request->url() || url('veriform') == $request->url() ) ){
            return redirect('login');
        }else{
            return $next($request);
        }

    }
}
