<?php

namespace App\Http\Middleware;

use Closure;

class APIkey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ( $request->apikey !== "mysecretapikey"){
            echo $request->apikey;
            return redirect('/');
        } else {
            return $next($request);
        }


    }
}
