<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$type): Response
    {
         $user = Auth::guard('sanctum')->user();

        if ($user && $user->tokenCan('type:' . $type)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);




    }
}
