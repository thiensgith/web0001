<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            return response()->json('You don\'t have permission to access.',401);
        }
        return $next($request);
    }
}
