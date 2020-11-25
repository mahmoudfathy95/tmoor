<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class apiLocale extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        $lang = isset($_SERVER['HTTP_LANG'])?$_SERVER['HTTP_LANG']:'en';
        \App::setLocale($lang);
        return $next($request);
    }
}
