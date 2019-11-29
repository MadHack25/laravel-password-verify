<?php

namespace App\Http\Middleware;

use Closure;

class PasswordChange
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
        /** Check if Password is Changed */
        if(!auth()->user()->isPasswordChanged()) 
            return redirect('/change');

        return $next($request);
    }
}
