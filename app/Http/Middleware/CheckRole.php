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
            if (Auth::narasumber()->role == 'narasumber') {
                return redirect()->route('narasumber');
            }
            if (Auth::penyelenggara()->role == 'penyelenggara') {
                return redirect()->route('penyelenggara');
            }
            if (Auth::narasumber()->role == 'narasumberprem') {
                return redirect()->route('narasumberprem');
            }
            if (Auth::penyelenggara()->role == 'penyelenggaraprem') {
                return redirect()->route('penyelenggaraprem');
            }
            Auth::logout();
            return redirect()->route('welcome');
        }
        
        return $next($request);
    }
}
