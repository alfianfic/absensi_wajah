<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !(auth()->user()->role === 1 || auth()->user()->role === 2)) {
            echo("
            <script>
            function pindahLink(url) {
                if (window.confirm('Silahkan Login Dahulu?')) {
                  window.location.href = url;
                }
              };
            pindahLink('/login');
            </script>
            ");
            abort(403);
        }
        return $next($request);
    }
}
