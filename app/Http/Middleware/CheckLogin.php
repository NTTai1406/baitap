<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    public function handle($request, closure $next)
    {
        if ($request->session()->has('user')) {
            return $next($request);
        }
        return redirect('login');
    }
}
