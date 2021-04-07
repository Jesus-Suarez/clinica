<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class AutenticacionUsuarios
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $sessionNombre = Session::get('sessionNombre');
        $sessionIdu = Session::get('sessionIdu');
        $sessionTipo = Session::get('sessionTipo');

        if ($sessionNombre == '' or $sessionIdu == '' or $sessionTipo == '') {
            Session::flash('message', 'Es necesario iniciar sesion primero!.');
            return redirect()->route('login');
        }
        return $next($request);
    }
}
