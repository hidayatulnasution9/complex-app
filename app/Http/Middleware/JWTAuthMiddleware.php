<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('Authorization')) {
            return response()->json(['message' => 'Authorization header missing'], 401);
        }

        $token = str_replace('Bearer ', '', $request->header('Authorization'));

        if (!$token || !Auth::attempt(['token' => $token])) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
