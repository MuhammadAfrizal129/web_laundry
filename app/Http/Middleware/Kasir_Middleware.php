<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Kasir_Middleware
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
        $user_auth = Auth::user();
        if($user_auth->role == 2){
            return $next($request);
        } else if($user_auth->role == 1) {
            return redirect("/admin/homeAdmin");
        }
    }
}
