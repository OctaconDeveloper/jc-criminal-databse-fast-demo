<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isSuperAdmin
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
        if(auth()->user())
        {
            if (isSuperAdmin()) {
                return $next($request);
            }
            return redirect('/error-403');
        }
        else
        {
            return redirect('/');
        }  
    }
}
