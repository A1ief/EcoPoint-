<?php

namespace App\Http\Middleware;

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
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Silakan login terlebih dahulu.'
            ], 401);
        }

        // Jika role tidak sesuai
        if (!in_array(auth()->user()->role, $roles)) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden. Anda tidak memiliki akses.',
                'required_role' => $roles,
                'your_role' => auth()->user()->role
            ], 403);
        }

        return $next($request);
    }
}
