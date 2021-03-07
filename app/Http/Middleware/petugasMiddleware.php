<?php

namespace App\Http\Middleware;

use Closure;

class petugasMiddleware
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
       
        if(!session('petugas'))
        {
            return redirect('petugas');
        }
        return $next($request);
    }
}
