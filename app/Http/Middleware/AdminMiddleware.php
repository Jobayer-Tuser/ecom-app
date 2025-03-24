<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        # session()->flush();
        if ( ! auth()->user()->hasRole(Role::ADMIN->value) ) {
            abort(403, 'Unauthorized action');
        }

        return $next($request);
    }
}
