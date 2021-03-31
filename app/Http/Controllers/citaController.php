<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consultorio;
use App\Models\doctores;
use App\Models\horarios;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class citaController extends Controller
{
    public function index()
    {
        return view('Admin.Citas.index', [
            'citas' =>  DB::table('citas')
                ->where('citas.deleted_at', (NULL))
                ->join('doctores', 'doctores.id_doctor', '=', 'citas.id_doctor')
                ->join('pacientes', 'pacientes.id_paciente', '=', 'citas.id_paciente')
                ->join('consultorios', 'consultorios.id_consultorio', '=', 'citas.id_consultorio')
                ->select(
                    'citas.id_cita',
                    'citas.fecha_cita',
                    'citas.hora',
                    'doctores.nombre_doc',
                    'doctores.ap_pat_doc',
                    'pacientes.nombre_pac',
                    'pacientes.ap_pat_pac',
                    'pacientes.email_pac',
                    'pacientes.telefono_pac',
                    'consultorios.numero',
                )
                ->orderBy('citas.created_at', 'desc')
                ->get(),
        ]);
    }

    public function crear()
    {
        return view('Admin.Citas.crear', [
            "doctores" => doctores::select('id_doctor', 'nombre_doc', 'ap_pat_doc', 'ap_mat_doc')
                ->orderBy('created_at', 'desc')
                ->get(),
            "pacientes" => Paciente::select('id_paciente', 'nombre_pac', 'ap_pat_pac')
                ->orderBy('created_at', 'desc')
                ->get(),
            "consultorios" => Consultorio::select('id_consultorio', 'numero')
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }

    public function almacenar(Request $request)
    {
        $this->validate($request, [
            'fecha_cita' => 'required|date',
            'hora' => 'required',
            'id_doctor' => 'required|numeric|integer',
            'id_paciente' => 'required|numeric|integer',
            'id_consultorio' => 'required|numeric|integer',
        ]);

        Cita::create($request->all());

        Session::flash('message', 'La cita ha sido creada exitosamente!');
        return redirect()->route('cita.index');
    }

    public function editar($id_cita)
    {
        return   view('Admin.Citas.editar', [
            "doctores" => doctores::select('id_doctor', 'nombre_doc', 'ap_pat_doc', 'ap_mat_doc')
                ->orderBy('created_at', 'desc')
                ->get(),
            "pacientes" => Paciente::select('id_paciente', 'nombre_pac', 'ap_pat_pac', 'ap_mat_pac')
                ->orderBy('created_at', 'desc')
                ->get(),
            "consultorios" => Consultorio::select('id_consultorio', 'numero')
                ->orderBy('created_at', 'desc')
                ->get(),
            "cita" => Cita::where('id_cita', $id_cita)
                ->get()
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $this->validate($request, [
            'fecha_cita' => 'required|date',
            'hora' => 'required',
            'id_doctor' => 'required|numeric|integer',
            'id_paciente' => 'required|numeric|integer',
            'id_consultorio' => 'required|numeric|integer',
        ]);

        $cita = Cita::find($id);
        $cita->fecha_cita = $request->fecha_cita;
        $cita->hora = $request->hora;
        $cita->id_doctor = $request->id_doctor;
        $cita->id_paciente = $request->id_paciente;
        $cita->id_consultorio = $request->id_consultorio;
        $cita->save();

        Session::flash('message', 'La cita ha sido actualizada exitosamente!!');
        return redirect()->route('cita.index');
    }

    //eliminacion logica
    public function desactivar($id)
    {
        Cita::destroy($id);
        Session::flash('message', 'La cita ha sido desactivada exitosamente!!');
        return back();
    }

    public function activar($id)
    {
        Cita::withTrashed()->findOrFail($id)->restore();
        Session::flash('message', 'La cita ha sido activada exitosamente!!');
        return back();
    }

    //Index de eliminacion logicas
    public function desactivados()
    {
        return view('Admin.Citas.desactivados', [
            'citas' =>  DB::table('citas')
                ->where('citas.deleted_at', '!=', (NULL))
                ->join('doctores', 'doctores.id_doctor', '=', 'citas.id_doctor')
                ->join('pacientes', 'pacientes.id_paciente', '=', 'citas.id_paciente')
                ->join('consultorios', 'consultorios.id_consultorio', '=', 'citas.id_consultorio')
                ->select(
                    'citas.id_cita',
                    'citas.fecha_cita',
                    'citas.hora',
                    'doctores.nombre_doc',
                    'doctores.ap_pat_doc',
                    'pacientes.nombre_pac',
                    'pacientes.ap_pat_pac',
                    'pacientes.email_pac',
                    'pacientes.telefono_pac',
                    'consultorios.numero',
                )
                ->orderBy('citas.created_at', 'desc')
                ->get(),

        ]);
    }

    //Eliminacion fisica
    public function eliminar($id)
    {
        Cita::onlyTrashed()->find($id)->forceDelete();
        Session::flash('message2', 'Cita eliminada permanentemente!!');
        return back();
    }
}
