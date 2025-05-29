<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // cek siapa user yang sedang login
        if(Auth::check() && Auth::user()->role !== $role) {
            // jika user tidak memiliki role yang sesuai, kembalikan response 403 Forbidden
            return response()->json(['message' => 'Forbidden'], 403);
        }
        return $next($request);
    }
}
