<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->cargo === 'admin') {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado');
    }
}
