<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role): Response
    {
        $user = Auth::user();

        // Cek apakah user memiliki role yang sesuai
        if (!$user || !$user->hasRole($role)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
