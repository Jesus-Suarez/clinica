<?php

namespace App\Http\Controllers;

use App\Models\doctores;
use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('Principal.index');
    }

    public function login()
    {
        return view('Admin.login');
    }

    public function acceder(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|regex:/^[A-Z,a-z,0-9,á,é,í,ó,ú,ñ]*$/',
        ]);

            )
                ->where('email_pac', $request->email)
                ->where('deleted_at', '=', (NULL))
                ->get();

            $cuantos = count($consulta);
        }

        //return Hash::check($request->password, $consulta[0]->password);

        if ($cuantos == 1 and Hash::check($request->password, $consulta[0]->password)) {
            Session::put('sessionNombre', $consulta[0]->nombre . ' ' . $consulta[0]->apellido);
            Session::put('sessionTipo', $consulta[0]->tipo);
            Session::put('sessionIdu', $consulta[0]->idu);
            Session::put('sessionFoto', $consulta[0]->foto);
            //returgit statusn gettype($consulta[0]->foto);
            return redirect()->route('Doctores');
        } else {
            Session::flash('message', 'Error, usuario o contraseña incorrecto.');
            return redirect()->route('login');
        }
    }

    public function salir()
    {
        Session::forget('sessionusuario');
        Session::forget('sessiontipo');
        Session::forget('sessionidu');
        Session::forget('sessionfoto');
        Session::flush();

        Session::flash('mesagge', 'Sesión cerrada');
        return redirect()->route('login');
    }
}
