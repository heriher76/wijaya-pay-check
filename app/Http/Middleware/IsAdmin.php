<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        $user = \Auth::user();
        if ($user->is_admin) {
            return $next($request);
        }else{
            \Auth::logout();

            return redirect('/login')->with(['forbidden', 'Dilarang']);
        }
    }
}
