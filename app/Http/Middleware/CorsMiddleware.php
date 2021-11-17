<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
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
        return $next($request)->header('Access-Control-Allow-Origin','*')
        ->header('Access-Control-Allow-Methods','GET,POST,PUT,DELETE,OPTIONS')
        ->header('Access-Control-Allow-Headers','Origin, Content-Type, X-Auth-Token,Authorization,x-requested-with')
        ->header('Access-Control-Allow-Credentials','true')
        ->header('Access-Control-Max-Age','3600');
        
    }
}
