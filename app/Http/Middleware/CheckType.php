<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckType
{
    public function handle(Request $request, Closure $next, $type)
    {
        if (Auth::user() && Auth::user()->type == $type) {
            return $next($request);
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }
}

