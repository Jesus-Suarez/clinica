<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tratamientos;
use Session;

class tratamientoController extends Controller
{
    public function Tratamientos()
    {
        $tratamiento=tratamientos::orderBy('descripcion_trat')->get();
        return view('Admin.Tratamientos.Tratamientos')
        ->with('tratamiento',$tratamiento);
    }
    public function nuevoTratamiento()
    {
        return view('Admin.Tratamientos.nuevoTratamiento');
    }

    public function guardaTratamiento(Request $request)
    {
        $this->validate($request, [
            'descripcion_trat' => 'required|regex:/^[a-z,0-9,A-Z, ,á,é,í,ó,ú,ñ]*$/',
        ]);

        $trat= new tratamientos();
        $trat->descripcion_trat = $request->descripcion_trat;
        $trat->save();
        Session::flash('message', 'El tratamiento se agrego satisfactoriamente!');
        return redirect()->route('Tratamientos'); 
    }
    public function modificaTratamiento($id_tratamiento)
    {
        $consulta=tratamientos::find($id_tratamiento);
        return view('Admin.Tratamientos.modificaTratamiento')
        ->with('consulta',$consulta);

    }
    public function updateTratamiento(Request $request)
    {
        $id_tratamiento = $request->id_tratamiento;
        
        $this->validate($request, [
            'descripcion_trat' => 'required|regex:/^[a-z,0-9,A-Z, ,á,é,í,ó,ú,ñ]*$/',
        ]);

        $trat= tratamientos::find($id_tratamiento);
        $trat->descripcion_trat = $request->descripcion_trat;
        $trat->save();
        Session::flash('message', 'El tratamiento se modifico satisfactoriamente!');
        return redirect()->route('Tratamientos');
    }
    public function desactivarTratamiento($id_tratamiento)
    {
        $tratamiento=tratamientos::find($id_tratamiento)->delete();
        Session::flash('message3', 'El tratamiento fue desactivado correctamente!');
        return redirect()->route('Tratamientos');
    }

    public function activarTratamiento($id_tratamiento)
    {
        $tratamiento=tratamientos::onlyTrashed()->where('id_tratamiento',$id_tratamiento)->restore();
        Session::flash('message', 'El tratamiento fue activado correctamente!');
        return redirect()->route('Tratamientos');
    }

    public function TratamientosElim()
    {
        $tratamiento=tratamientos::onlyTrashed()->get();
        return view('Admin.Tratamientos.TratamientosElim')
        ->with('tratamiento',$tratamiento);
    }
    public function eliminarTratamiento($id_tratamiento)
    {
        //$buscadoc=tratamientos::where('id_tratamiento',$id_tratamiento)->get();
        //$cuantos= count($buscadoc);
        //if($cuantos==0){
            $tratamientos=tratamientos::onlyTrashed()->find($id_tratamiento)->forceDelete();
            Session::flash('message2', 'El tratamiento fue eliminado permanentemente!');
            return redirect()->route('Tratamientos');
        //}
        //else{
           // Session::flash('message2', 'El tratamiento no puede ser eliminada ya que tiene registros en doctores!');
            //return redirect()->route('EspecialidadesElim');
        //}  
    }
}
