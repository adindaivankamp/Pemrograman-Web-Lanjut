<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
    
        if (!$user) {
            return redirect()->route('login'); // atau bisa redirect ke halaman lain yang kamu mau
        }
    
        $user_role = $user->getRole(); // baru akses setelah user terjamin ada
    
        if (in_array($user_role, $roles)) {
            return $next($request); // lanjutkan kalau role cocok
        }
    
        abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini'); // tampilkan error kalau role-nya gak cocok
    }
    
}
