<?php

namespace App\Http\Middleware;

use Closure;
use App\Http;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = $request->user();
        
        if ($user === null || $user->role !== $role) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
