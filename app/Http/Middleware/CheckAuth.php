<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(session()->has('id_user') && in_array(session()->get('role_id'), $roles)){
            // abort(403);

            return $next($request);
        }
        return redirect(route('login'));
    }
}
