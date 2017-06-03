<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
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
        if(Auth::user() && Auth::user()->admin) // is an admin
        {
            return $next($request); // pass the admin
        }

        return redirect('/')->with('status', 'Sadece adminler bu sayfaya erişebilir dostum!'); // not admin. redirect whereever you like
    }
}
