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

        $EnableAuthentication = false;
        $secretKey = 'HvctjqPakWee9EbLueq0YL85CUwo65kaW4g4H8df';
        $acceptableIPs = ['127.0.0.1'];

        $token = $request->header('APP_KEY');
        if ( ($token !== $secretKey || !in_array($request->ip(), $acceptableIPs)) && $EnableAuthentication ){
            return response()->view('video.video',[ 'result' => 'false' ,'message' => 'Authentication failed'], 401);
        }

        return $next($request);

    }
}
