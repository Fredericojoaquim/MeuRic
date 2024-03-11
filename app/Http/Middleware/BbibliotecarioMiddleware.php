<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class BbibliotecarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          // Verifique se o usuário está autenticado e tem a permissão específica
          if (Auth::check() && Auth::user()->hasPermissionTo('admin')) {
            return $next($request);
        }

        // Se não tiver a permissão, redirecione ou retorne uma resposta de não autorizado
        abort(403);
    }
}
