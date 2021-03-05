<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class pacienteController extends Controller
{
    public function index()
    {
        return view('Admin.Pacientes.index', [
            'pacientes' => Paciente::select()
                ->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function crear()
    {
        return view('Admin.Pacientes.crear');
    }

    public function almacenar(Request $request)
    {
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
            'calle' => 'required|regex:/^[0-9,a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'numero' => 'required|regex:/^[0-9,a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'email_pac' => 'required|email|unique:pacientes',
            'pass_pac' => 'required|regex:/^[A-Z,a-z,0-9,á,é,í,ó,ú,ñ]*$/',
            'foto_pac' => 'mimes:jpeg,png,jpg,gif'
        ]);

        Paciente::create($request->all());

        Session::flash('message', 'El paciente ' . $request->nombre_pac . ' ' . $request->ap_pat_pac . ' ha sido creado exitosamente!');
        return redirect()->route('paciente.index');
    }

    public function editar(paciente $paciente)
    {
        return view('Admin.Pacientes.editar', [
            'paciente' => $paciente
        ]);
    }
}
