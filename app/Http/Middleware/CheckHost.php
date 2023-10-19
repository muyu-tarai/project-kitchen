<?php

namespace App\Http\Middleware;

use Closure;

class CheckHost
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
    $allowed_hosts = ['kitchencar-station.onrender.com', '127.0.0.1'];
    if (!in_array($request->getHost(), $allowed_hosts)) {
        abort(403);
    }
    return $next($request);
}
    
}
