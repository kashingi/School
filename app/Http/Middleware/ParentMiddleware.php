<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class ParentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(Auth::check())) {
            # code...
            if (Auth::user()->user_type == 4) {
                # code...
                return $next($request);
            }
            else {
                # code...
                Auth::logout();
                return redirect(url(''));
            }
            
        } else {
            # code...
            Auth::logout();
            return redirect(url(''));
        }
        
    }
}
