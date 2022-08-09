<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MigrationSecurity
{
    public function handle(Request $request, Closure $next)
    {
        if($request->header('API-SECRET') != \config('app.API_SECRET'))
        {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized Access'
                ], 401);
        }
        return $next($request);
    }
}
