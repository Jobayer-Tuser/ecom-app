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
//        session()->flush();
        if ( ! auth()->check() || auth()->user()->role_id !== Role::ADMIN->value ) {
            abort(403);
        }

        return $next($request);
    }
}
