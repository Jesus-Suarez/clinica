<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dia;
use App\Models\doctores;
use App\Models\horarios;
use Illuminate\Support\Facades\DB;
use Session;

class diaController extends Controller
{
    public function index()
    {
        return view('Admin.Dias.index', [
            'dias' =>  DB::table('dias')
                ->where('dias.deleted_at', (NULL))
                ->join('doctores', 'doctores.id_doctor', '=', 'dias.id_doctor')
                ->join('horarios', 'horarios.id_horario', '=', 'dias.id_horario')
                ->select(
                    'dias.id_dia',
                    'dias.nombre_dia',
                    'doctores.nombre_doc',
                    'doctores.ap_pat_doc',
                    'horarios.hora_inicio',
                    'horarios.hora_fin'
                )
                ->orderBy('dias.created_at', 'desc')
                ->get(),
        ]);
    }

    public function crear()
    {
        return view('Admin.Dias.crear', [
            "doctores" => doctores::select('id_doctor', 'nombre_doc', 'ap_pat_doc', 'ap_mat_doc')
                ->orderBy('created_at', 'desc')->get(),
            "horarios" => horarios::select('id_horario', 'hora_inicio', 'hora_fin')
                ->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function almacenar(Request $request)
    {
        $this->validate($request, [
            'nombre_dia' => 'required|regex:/^[A-Z][a-z,A-Z]*$/',
            'id_doctor' => 'required|integer',
            'id_horario' => 'required|integer',
        ]);

        Dia::create($request->all());

        Session::flash('message', 'El dia ' . $request->nombre_dia . ' ha sido dado de alta exitosamente!');
        return redirect()->route('dia.index');
    }

    public function editar($id)
    {
        return  view('Admin.Dias.editar', [
            "doctores" => doctores::select('id_doctor', 'nombre_doc', 'ap_pat_doc')
                ->orderBy('created_at', 'desc')->get(),
            "horarios" => horarios::select('id_horario', 'hora_inicio', 'hora_fin')
                ->orderBy('created_at', 'desc')->get(),
            "dias" => Dia::select('id_dia', 'nombre_dia')
                ->orderBy('created_at', 'desc')->get(),
            "dia" => Dia::where('id_dia', $id)->get()
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_dia' => 'required|regex:/^[A-Z][a-z,A-Z]*$/',
            'id_doctor' => 'required|integer',
            'id_horario' => 'required|integer',
        ]);

        $dia = Dia::find($id);
        $dia->nombre_dia = $request->nombre_dia;
        $dia->id_doctor = $request->id_doctor;
        $dia->id_horario = $request->id_horario;
        $dia->save();

        Session::flash('message', 'El dia ' . $request->nombre_dia . ' ha sido modificado exitosamente!!');
        return redirect()->route('dia.index');
    }

    //eliminacion logica
    public function desactivar($id)
    {
        Dia::destroy($id);
        Session::flash('message3', 'El dia ha sido desactivado exitosamente!!');
        return back();
    }

    public function activar($id)
    {
        Dia::withTrashed()->findOrFail($id)->restore();
        Session::flash('message3', 'El dia ha sido activado exitosamente!!');
        return back();
    }

    //Index de eliminacion logicas
    public function desactivados()
    {
        return view('Admin.Dias.desactivados', [
            'dias' => Dia::onlyTrashed()->get()
        ]);
    }

    //Eliminacion fisica
    public function eliminar($id)
    {
        Dia::onlyTrashed()->find($id)->forceDelete();
        Session::flash('message2', 'Día eliminado permanentemente!!');
        return back();
    }
}
