<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSessionExpiration
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
        // Verifica se o usuário está autenticado e a sessão não expirou
        if (auth()->check() && !$request->session()->has('lastActivityTime')) {
            $lastActivityTime = now();
            $request->session()->put('lastActivityTime', $lastActivityTime);
        } elseif (auth()->check() && $request->session()->has('lastActivityTime')) {
            $lastActivityTime = $request->session()->get('lastActivityTime');
            $expirationTime = config('session.lifetime') * 60; // Converte minutos para segundos

            // Verifica se o tempo desde a última atividade ultrapassou o tempo de expiração
            if (now()->diffInRealMinutes($lastActivityTime) > $expirationTime) {
                auth()->logout();
                $request->session()->invalidate();
                return redirect('/login')->withErrors(['session_expired' => 'Sua sessão expirou. Faça login novamente.']);
            }
        }
        return $next($request);
    }
}
