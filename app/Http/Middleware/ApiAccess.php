<?php

namespace App\Http\Middleware;

use Closure;

class ApiAccess
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
        if(!auth()->guard('api')->user()->authority->authorityApi->isActive){
          return response()->json(['data' => 'Account not active' ], 401);
        }
        return $next($request);
    }
}
