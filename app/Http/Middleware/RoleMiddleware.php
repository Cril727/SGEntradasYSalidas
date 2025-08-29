<?php

namespace App\Http\Middleware;

use App\Models\personas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        
    

        $user = personas::find(auth('api')->id());
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $has = $user->roles()->whereIn('rol', $roles)->exists();

        if (!$has) {
            return response()->json(['message' => 'Forbidden'], 403);
        }


        return $next($request);
    }
}
