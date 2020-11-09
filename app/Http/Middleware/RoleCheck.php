<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class RoleCheck
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
        $user = User::where('email', $request->email)->get();
        if ($user->role == 'admin') {
            return redirect()->route('admin');
        } else if ($user->role == 'farmer') {
            return redirect()->route('farmer');
        }

        return $next($request);
    }
}
