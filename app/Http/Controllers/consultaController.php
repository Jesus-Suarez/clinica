<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consulta;
use App\Models\tratamientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class consultaController extends Controller
{
    public function index()
    {
        return view('Admin.Consultas.index', [
            'consultas' =>  DB::table('consultas')
                ->where('consultas.deleted_at', (NULL))
                ->join('citas', 'citas.id_cita', '=', 'consultas.id_cita')
                ->join('tratamientos', 'tratamientos.id_tratamiento', '=', 'consultas.id_tratamiento')
                ->select(
                    'consultas.id_consulta',
                    'consultas.costo',
                    'citas.fecha_cita',
                    'citas.hora',
                    'tratamientos.descripcion_trat'
                )
                ->orderBy('consultas.created_at', 'desc')
                ->get(),
        ]);
    }

    public function crear()
    {
        return view('Admin.Consultas.crear', [
            "Citas" => Cita::select('id_cita', 'nombre_doc', 'ap_pat_doc', 'ap_mat_doc')
                ->orderBy('created_at', 'desc')
                ->get(),
            "Tratamientos" => tratamientos::select('id_paciente', 'nombre_pac', 'ap_pat_pac')
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }

    public function almacenar(Request $request)
    {
        $this->validate($request, [
            'costo' => 'required|regex:/^[0-9]+[.][0-9]{2}$/',
            'id_cita' => 'required|numeric',
            'id_tratamiento' => 'required|numeric',
        ]);

        Cita::create($request->all());

        Session::flash('message', 'La cita ha sido creada exitosamente!');
        return redirect()->route('cita.index');
    }

    public function editar($id)
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
            "cita" => Cita::where('id_cita', $id)
                ->get()
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $this->validate($request, [
            'costo' => 'required|regex:/^[0-9]+[.][0-9]{2}$/',
            'id_cita' => 'required|numeric',
            'id_tratamiento' => 'required|numeric',
        ]);

        $cita = Cita::find($id);
        $cita->fecha_cita = $request->fecha_cita;
        $cita->hora = $request->hora;
        $cita->id_doctor = $request->id_doctor;
        $cita->id_paciente = $request->id_paciente;
        $cita->id_consultorio = $request->id_consultorio;
        $cita->save();

        Session::flash('message3', 'La cita ha sido actualizada exitosamente!!');
        return redirect()->route('cita.index');
    }

    //eliminacion logica
    public function desactivar($id)
    {
        Consulta::destroy($id);
        Session::flash('message3', 'La consulta ha sido desactivada exitosamente!!');
        return back();
    }

    public function activar($id)
    {
        Consulta::withTrashed()->findOrFail($id)->restore();
        Session::flash('message3', 'La cita ha sido activada exitosamente!!');
        return back();
    }

    //Index de eliminacion logicas
    public function desactivados()
    {
        return view('Admin.Consultas.desactivados', [

            'consultas' =>  DB::table('consultas')
                ->where('consultas.deleted_at', '!=', (NULL))
                ->join('citas', 'citas.id_cita', '=', 'consultas.id_cita')
                ->join('tratamientos', 'tratamientos.id_tratamiento', '=', 'consultas.id_tratamiento')
                ->select(
                    'consultas.id_consulta',
                    'consultas.costo',
                    'citas.fecha_cita',
                    'citas.hora',
                    'tratamientos.descripcion_trat'
                )
                ->orderBy('consultas.created_at', 'desc')
                ->get(),
        ]);
    }

    //Eliminacion fisica
    public function eliminar($id)
    {
        Consulta::onlyTrashed()->find($id)->forceDelete();
        Session::flash('message2', 'Consulta eliminada permanentemente!!');
        return back();
    }
}
