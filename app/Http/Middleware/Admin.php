<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::user()) {
            $get_arguments = $request->route()->parameters();
            $is_admin = Auth::user()->komunitas->where('id',$get_arguments[0])->pivot->status_admin;
            if ($is_admin) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
