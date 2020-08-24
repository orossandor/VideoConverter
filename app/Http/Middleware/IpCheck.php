<?php

namespace App\Http\Middleware;

use Closure;

class IpCheck
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
        $restrictIps = ['5.2.77.63',
                        //'127.0.0.1',
                        '18.27.197.252',
                        '27.50.70.87'];

        if (in_array($request->ip(), $restrictIps)) {
            return redirect('/block');
        }

        return $next($request);

    }
}
