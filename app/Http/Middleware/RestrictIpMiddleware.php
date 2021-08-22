<?php

namespace App\Http\Middleware;

use Closure;

class RestrictIpMiddleware
{

    public $restrictIps = ['65.1.137.90', '127.0.0.1'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array($request->ip(), $this->restrictIps)) {
            return response()->json(['message' => "You don't have permission to access this website."]);
        }
        return $next($request);
    }
}
