<?php

// app/Http/Middleware/LocaleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the locale is stored in the session
        if (session()->has('locale')) {
            // Set the application locale
            App::setLocale(session('locale'));
        }

        return $next($request);
    }
}
