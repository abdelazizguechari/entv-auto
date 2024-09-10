<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ThemeMiddleware
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
        // Get the theme from the session or default to 'dark'
        $theme = $request->session()->get('theme', 'dark');

        // Share the theme variable with all views
        view()->share('theme', $theme);

        return $next($request);
    }
}
