<?php

namespace App\Http\Middleware;

use Closure;
use Config;
class Localization
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
        if(\Session::has('locale'))
        {
            \App::setlocale(\Session::get('locale'));
        }
        else {
            \App::setLocale(Config::get('app.locale'));
        }
       
       return $next($request);
    }
}
