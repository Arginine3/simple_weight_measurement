<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToHttps
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
        //このhandleメソッドで判別
        if (!$this->is_ssl() && config('app.env') === 'production') {
            return redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        }

        return $next($request);
    }

    public function is_ssl()
    {
        if (isset($_SERVER['HTTPS']) === true) { // nginx
            return ($_SERVER['HTTPS'] === 'on' or $_SERVER['HTTPS'] === '1');
        }
        elseif (isset($_SERVER['SSL']) === true) { // IIS
            return ($_SERVER['SSL'] === 'on');
        }
        elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) === true) { // Reverse proxy
            return (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
        }
        elseif (isset($_SERVER['HTTP_X_FORWARDED_PORT']) === true) { // Reverse proxy
            return ($_SERVER['HTTP_X_FORWARDED_PORT'] === '443');
        }
        elseif (isset($_SERVER['SERVER_PORT']) === true) {
            return ($_SERVER['SERVER_PORT'] === '443');
        }

        return false;
    }
}
