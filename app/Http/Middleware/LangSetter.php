<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Config;

class LangSetter
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
        if(Session::has('applocale')){
            app()->setLocale(Session::get('applocale'));
        }else{
            App::setLocale(Config::get('app.fallback_locale'));
        }


        return $next($request);
    }
}
