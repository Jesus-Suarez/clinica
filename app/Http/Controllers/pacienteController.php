<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;

class pacienteController extends Controller
{
    public function index()
    {
        return view('Admin.Pacientes.index', [
            'pacientes' => Paciente::select()
                ->orderBy('created_at', 'desc')
                ->get()
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
            'telefono_pac' => 'required|digits:10',
            'estado' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'municipio' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'cp' => 'required|regex:/^[0-9]{5}$/',
            'calle' => 'required|regex:/^[0-9,a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'numero' => 'required|regex:/^[0-9,a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'email_pac' => 'required|email|unique:pacientes',
            'foto_pac' => 'mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->hasFile('foto_pac')) {
            $request->foto_pac = $request->file('foto_pac')->store('public'); //hacer el enlace php artisan storage:link
        }

        $paciente = new Paciente;
        $paciente->nombre_pac = $request->nombre_pac;
        $paciente->ap_pat_pac = $request->ap_pat_pac;
        $paciente->ap_mat_pac = $request->ap_mat_pac;
        $paciente->sexo_pac = $request->sexo_pac;
        $paciente->fecha_nac = $request->fecha_nac;
        $paciente->telefono_pac = $request->telefono_pac;
        $paciente->estado = $request->estado;
        $paciente->municipio = $request->municipio;
        $paciente->cp = $request->cp;
        $paciente->calle = $request->calle;
        $paciente->numero = $request->numero;
        $paciente->email_pac = $request->email_pac;
        $paciente->foto_pac = $request->foto_pac;
        $paciente->save();

        Session::flash('message', 'El paciente ' . $request->nombre_pac . ' ' . $request->ap_pat_pac . ' ha sido creado exitosamente!!');
        return redirect()->route('paciente.index');
    }

    public function editar(paciente $paciente)
    {
        return view('Admin.Pacientes.editar', [
            'paciente' => $paciente
        ]);
    }

    public function actualizar(Request $request, $id)
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
            'email_pac' => 'required|email',
            'foto_pac' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $paciente = Paciente::find($id);

        if ($request->hasFile('foto_pac')) {
            Storage::delete($paciente->foto_pac);
            $request->foto_pac = $request->file('foto_pac')->store('public');
            $paciente->foto_pac = $request->foto_pac;
        }

        $paciente->nombre_pac = $request->nombre_pac;
        $paciente->ap_pat_pac = $request->ap_pat_pac;
        $paciente->ap_mat_pac = $request->ap_mat_pac;
        $paciente->sexo_pac = $request->sexo_pac;
        $paciente->fecha_nac = $request->fecha_nac;
        $paciente->telefono_pac = $request->telefono_pac;
        $paciente->estado = $request->estado;
        $paciente->municipio = $request->municipio;
        $paciente->cp = $request->cp;
        $paciente->calle = $request->calle;
        $paciente->numero = $request->numero;
        $paciente->email_pac = $request->email_pac;
        $paciente->save();

        Session::flash('message', 'El paciente ' . $request->nombre_pac . ' ' . $request->ap_pat_pac . ' ha sido modificado exitosamente!!');
        return redirect()->route('paciente.index');
    }

    //eliminacion logica
    public function desactivar($id)
    {
        Paciente::destroy($id);
        Session::flash('message3', 'El paciente ha sido desactivado exitosamente!!');
        return back();
    }

    public function activar($id)
    {
        Paciente::withTrashed()->findOrFail($id)->restore();
        Session::flash('message3', 'El paciente ha sido activado exitosamente!!');
        return back();
    }

    //Index de eliminacion logicas
    public function desactivados()
    {
        return view('Admin.Pacientes.desactivados', [
            'pacientes' => Paciente::onlyTrashed()->get()
        ]);
    }

    //Eliminacion fisica
    public function eliminar($id)
    {
        $paciente = Paciente::onlyTrashed()->find($id)->forceDelete();

        Storage::delete($paciente->foto_pac);

        Session::flash('message2', 'Paciente eliminado permanentemente!!');
        return back();
    }
}
