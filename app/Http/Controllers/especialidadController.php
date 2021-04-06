<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\especialidades;
use App\Models\doctores;
use Session;

class especialidadController extends Controller
{
    public function Especialidades()
    {
        $especialidad=especialidades::all();
        return view('Admin.Especialidades.Especialidades')
        ->with('especialidad',$especialidad);

    }
    public function nuevaEspecialidad()
    {
        return view('Admin.Especialidades.nuevaEspecialidad');
    }

    public function guardaEspecialidad(Request $request)
    {

        $this->validate($request, [
            'nombre_esp' => 'required|regex:/^[A-Z][a-z,A-Z,0-9, ,á,é,í,ó,ú,ñ]*$/',
        ]);

        $esp= new especialidades;
        $esp->nombre_esp = $request->nombre_esp;
        $esp->save();
        Session::flash('message', 'Especialidad: ' . $esp->nombre_esp . ' se agrego satisfactoriamente!');
        return redirect()->route('Especialidades'); 
    }

    public function modificaEspecialidad($especialidad_id)
    {
        $consulta=especialidades::find($especialidad_id);
        return view('Admin.Especialidades.modificaEspecialidad')
        ->with('consulta',$consulta);

    }
    public function updateEspecialidad(Request $request)
    {
        $especialidad_id = $request->especialidad_id;
        
        $this->validate($request, [
            'nombre_esp' => 'required|regex:/^[A-Z][a-z,A-Z,0-9, ,á,é,í,ó,ú,ñ]*$/',
        ]);

        $esp= especialidades::find($especialidad_id);
        $esp->nombre_esp = $request->nombre_esp;
        $esp->save();
        Session::flash('message', 'La especialidad se modifico satisfactoriamente!');
        return redirect()->route('Especialidades');
    }

    public function desactivarEspecialidad($especialidad_id)
    {
        $especialidad=especialidades::find($especialidad_id)->delete();
        Session::flash('message3', 'La especialidad fue desactivada correctamente!');
        return redirect()->route('Especialidades');
    }

    public function activarEspecialidad($especialidad_id)
    {
        $especialidad=especialidades::onlyTrashed()->where('especialidad_id',$especialidad_id)->restore();
        Session::flash('message', 'La especialidad fue activada correctamente!');
        return redirect()->route('Especialidades');
    }

    public function EspecialidadesElim()
    {
        $especialidad=especialidades::onlyTrashed()->get();
        return view('Admin.Especialidades.EspecialidadesElim')
        ->with('especialidad',$especialidad);
    }
    public function eliminarEspecialidad($especialidad_id)
    {
        $buscadoc=doctores::where('especialidad_id',$especialidad_id)->get();
        $cuantos= count($buscadoc);
        if($cuantos==0){
            $especialidades=especialidades::onlyTrashed()->find($especialidad_id)->forceDelete();
            Session::flash('message2', 'La especialidad fue eliminada permanentemente!');
            return redirect()->route('Especialidades');
        }
        else{
            Session::flash('message2', 'La especialidad no puede ser eliminada ya que tiene registros en doctores!');
            return redirect()->route('EspecialidadesElim');
        }  
    }
}
