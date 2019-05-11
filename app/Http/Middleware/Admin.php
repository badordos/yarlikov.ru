<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Допуск админу
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->is_admin){
            return $next($request);
        }else{
            return redirect(route('home'));
        }
    }
}
