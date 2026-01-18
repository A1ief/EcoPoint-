<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // BELUM LOGIN → REDIRECT LOGIN
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // ROLE TIDAK SESUAI → 403 PAGE
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
