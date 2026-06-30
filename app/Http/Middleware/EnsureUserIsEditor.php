<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsEditor
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()?->isEditor()) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin admin.');
        }

        return $next($request);
    }
}
