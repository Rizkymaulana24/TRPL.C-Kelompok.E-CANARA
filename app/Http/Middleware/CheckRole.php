<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // redirect to current role
        if (Auth::user()->role != $role) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin');
            }
            if (Auth::user()->role == 'narasumber') {
                return redirect()->route('narasumber');
            }
            if (Auth::user()->role == 'penyelenggara') {
                return redirect()->route('penyelenggara');
            }
            Auth::logout();
            return redirect()->route('welcome');
        }
        
        return $next($request);
    }
}
