<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Cek dulu apakah user-nya null (belum login)
        if (!$user) {
            return redirect()->route('login'); // Atau arahkan ke rute login kamu
        }

        $user_role = $user->getRole(); // Baru ambil role-nya

        // Cek apakah role-nya termasuk yang diizinkan
        if (in_array($user_role, $roles)) {
            return $next($request);
        }

        // Kalau role-nya gak sesuai, kasih forbidden
        abort(403, 'Unauthorized');
    }
}
