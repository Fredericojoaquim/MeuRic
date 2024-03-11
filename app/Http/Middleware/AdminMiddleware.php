<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
            // Ou você pode retornar uma resposta HTTP 403 Forbidden:
            // return response('Acesso não autorizado.', 403);
        }
}

