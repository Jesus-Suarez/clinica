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

        $consulta = Paciente::select(
            'id_paciente as idu',
            'email_pac as email',
            'password_pac as password',
            'nombre_pac as nombre',
            'ap_pat_pac as apellido',
            'foto_pac as foto'
        )
            ->where('email_pac', $request->email)
            ->where('deleted_at', '=', (NULL))
            ->get();

        $cuantos = count($consulta);

        if ($cuantos != 0) {
            $consulta[0]->tipo = 'paciente';
        }

        //Consultamos en la siguiente tabla
        if ($cuantos == 0) {
            $consulta = doctores::select(
                'id_doctor as idu',
                'email_doc as email',
                'password_doc as password',
                'nombre_doc as nombre',
                'ap_pat_doc as apellido',
                'foto_doc as foto',
                'tipo'
            )
                ->where('email_doc', $request->email)
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
            //return gettype($consulta[0]->foto);
            return redirect()->route('Doctores');
        } else {
            Session::flash('message', 'Error, usuario o contraseña incorrecto.');
            return redirect()->route('login');
        }
    }

    public function salir()
    {
        Session::forget('sessionNombre');
        Session::forget('sessionTipo');
        Session::forget('sessionIdu');
        Session::forget('sessionFoto');
        Session::flush();

        Session::flash('mesagge', 'Sesión cerrada');
        return redirect()->route('login');
    }
}
