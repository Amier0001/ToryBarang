<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class JwtMiddleware
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
		try {

			if (! $user = JWTAuth::parseToken()->authenticate()) {
				return response()->json(['message'=>'user_not_found'], 404);
			}

		} catch(\Exception $e){
			return response()->json(["message" => $e->getMessage()], 404);
		}
        return $next($request);
    }
}
