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
        $sessionFoto = Session::get('sessionFoto');


        if ($sessionNombre == '' or $sessionIdu == '' or $sessionTipo == '' or $sessionFoto == '') {
            Session::flash('message', 'Debes loguearte amigo!!!');
            return redirect()->route('login');
        }
        return $next($request);
    }
}
