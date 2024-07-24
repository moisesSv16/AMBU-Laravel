<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUtf8
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Content-Type', 'application/json; charset=utf-8');
        $request->headers->set('Accept-Charset', 'utf-8');

        $response = $next($request);
        $response->headers->set('Content-Type', 'application/json; charset=utf-8');
        return $response;
    }
}
