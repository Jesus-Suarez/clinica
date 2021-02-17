<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pacienteController extends Controller
{
    public function nuevoPaciente()
    {
        return view('Admin.Pacientes.nuevoPaciente');
    }
    public function guardaPaciente(Request $request)
    {
        $nombre_pac = $request->nombre_pac;
        $ap_pat_pac = $request->ap_pat_pac;
        $ap_mat_pac = $request->ap_mat_pac;
        $sexo_pac = $request->sexo_pac;
        $fecha_nac = $request->fecha_nac;
        $telefono_pac = $request->telefono_pac;
        $estado = $request->estado;
        $municipio = $request->municipio;
        $cp = $request->cp;
        $calle = $request->calle;
        $numero = $request->numero;
        $email_pac = $request->email_pac;
        $pass_pac = $request->pass_pac;
        $foto_pac = $request->foto_pac;

        $this->validate($request, [
            'nombre_pac' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_pat_pac' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_mat_pac' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'sexo_pac' => 'required',
            'fecha_nac' => 'required',
            'telefono_pac' => 'required|regex:/^[0-9]{10}$/',
            'estado' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'municipio' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'cp' => 'required|regex:/^[0-9]{5}$/',
            'calle' => 'required|regex:/^[A-Z][0-9,a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'numero' => 'required|regex:/^[0-9,a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'email_pac' => 'required|email',
            'pass_pac' => 'required|regex:/^[A-Z,a-z,0-9,á,é,í,ó,ú,ñ]*$/',
            'foto_pac' => 'required|mimes:jpeg,png,jpg,gif'


        ]);


        echo ("Datos correctos");
    }
}
 