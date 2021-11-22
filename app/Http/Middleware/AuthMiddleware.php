<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpFoundation\Session\Session;

use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guest = null)
    {
         if(!session()->get('auth') && !$guest) {
            return redirect()->to('auth/login');
         }else if(session()->get('auth') && $guest) {
            return redirect()->to('admin');
         }

        return $next($request);

    }
}
