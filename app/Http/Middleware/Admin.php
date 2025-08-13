<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está logado e se é admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Se não for admin, redireciona ou mostra 403
        abort(403, 'Acesso negado!');
    }
}
