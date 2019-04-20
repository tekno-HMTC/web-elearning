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
            $is_admin = Auth::user()->komunitas->where('id',$get_arguments["kmt_id"])->first()->pivot->status;
            if ($is_admin == 2) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
