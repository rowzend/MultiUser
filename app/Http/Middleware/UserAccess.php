<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        Log::info('User Type: ' . Auth::user()->type);
        Log::info('Required Type: ' . $userType);

        if (Auth::user()->type === $userType) { // Gunakan === untuk perbandingan strict antara tipe data
            return $next($request);
        }

        return response()->json(['You do not have permission to access for this page.']);
    }
}
