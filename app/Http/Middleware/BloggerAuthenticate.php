<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BloggerAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('logged_user_now') && (url('') == $request->url() || url('BloggerRegister') == $request->url()))
        {
            return back();
        }
        return $next($request);
    }
}
