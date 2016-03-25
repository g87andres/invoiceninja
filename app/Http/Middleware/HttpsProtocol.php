<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if (env('APP_ENV') === 'production') {
            // for Proxies
            Request::setTrustedProxies([$request->getClientIp()]);
            if (!$request->isSecure()) {
                return redirect()->secure($request->getRequestUri());
            }
        }

            return $next($request); 
    }
}