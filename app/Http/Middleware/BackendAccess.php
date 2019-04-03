<?php

namespace App\Http\Middleware;

use Closure;

class BackendAccess
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
        $roles=collect(['Developer', 'Admin', 'Manager', 'Developer']);
        if (!$roles->contains($request->user()->role)) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
