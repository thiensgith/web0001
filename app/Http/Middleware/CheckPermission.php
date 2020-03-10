<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! $request->user()->roles()->hasPermission($permission)) {
            return response()->json('You don\'t have permission to access.',401);
        }
        return $next($request);
    }
}
