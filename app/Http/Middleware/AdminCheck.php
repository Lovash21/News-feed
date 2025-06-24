<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response  //проверяем что пользователь есть и он админ
    {
        if (Auth::check() && Auth::user()->is_admin === 1) {
            return $next($request); // Разрешаем доступ к запрашиваемому ресурсу
        }

        abort(403);
    }
}
