<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        // Se espera JSON (ex: API), retorna resposta 401
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Não autenticado. Token ausente ou inválido.'
            ], 401);
        }

        // Caso contrário, redireciona normalmente
        redirect()->guest($this->redirectTo($request))->send();
    }

}
