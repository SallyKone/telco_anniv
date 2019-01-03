<?php

namespace App\Http\Middleware;

use Closure;
use App\Utilisateurs;

class MUtilisateur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('utlisteur')){
            $utilisat = Utilisateurs::findOrfail(session()->get('utlisteur'));
            if ($utilisat) {
                return $next($request);
            }
            return redirect('admins/login');
        }
        return redirect('admins/login');
    }
}
