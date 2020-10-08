<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
    $response = $next($request);

        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Methods', '*');
        $response->header('Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,X-Auth-Token,Origin,Authorization,Accept');
        //Access-Control-Allow-Credentials true or false
        return $response;

//         $response = $next($request);
// $response->headers->set('Access-Control-Allow-Origin', '*');
// $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
// $response->headers->set('Access-Control-Allow-Headers',' Origin, Content-Type, Accept, Authorization, X-Request-With, X-Auth-Token');
// $response->headers->set('Access-Control-Allow-Credentials',' true');
// return $response;
}
}
