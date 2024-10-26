<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddNotificationsToView
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $notifications = Auth::user()->notifications()->latest()->take(5)->get();
            view()->share('notifications', $notifications);
            view()->share('notificationCount', $notifications->count());
        }

        return $next($request);
    }
}
