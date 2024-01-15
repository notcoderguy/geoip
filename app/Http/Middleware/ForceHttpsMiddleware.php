<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttpsMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->isSecure()) {
            // Redirect to the HTTPS version of the URL
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
