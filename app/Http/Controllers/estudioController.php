<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudio;
use Session;

class estudioController extends Controller
{
    public function index()
    {
        return view('Admin.Estudios.index', [
            'estudios' => Estudio::select()
                ->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function crear()
    {
        return view('Admin.Estudios.crear');
    }

    public function almacenar(Request $request)
    {
        $this->validate($request, [
            'nombre_est' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'descripcion_est' => 'required|min:5|max:255|regex:/^[a-z,A-Z, ,á,é,í,ó,ú,ñ,.,]*$/'
        ]);

        Estudio::create($request->all());

        Session::flash('message', 'El estudio ' . $request->nombre_est . ' ha sido creado exitosamente!!');
        return redirect()->route('estudio.index');
    }

    public function editar(estudio $estudio)
    {
        return view('Admin.Estudios.editar', [
            'estudio' => $estudio
        ]);
    }

    public function actualizar(Request $request, $id)
    {

        $this->validate($request, [
            'nombre_est' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'descripcion_est' => 'required|min:5|max:255|regex:/^[a-z,A-Z, ,á,é,í,ó,ú,ñ,.,]*$/'
        ]);

        $estudio = Estudio::find($id);
        $estudio->nombre_est = $request->nombre_est;
        $estudio->descripcion_est = $request->descripcion_est;
        $estudio->save();

        Session::flash('message', 'El estudio ' . $request->nombre_est . ' ha sido modificado exitosamente!!');
        return redirect()->route('estudio.index');
    }

    //eliminacion logica
    public function desactivar($id)
    {
        Estudio::destroy($id);
        Session::flash('message', 'El estudio ha sido desactivado exitosamente!!');
        return back();
    }

    public function activar($id)
    {
        Estudio::withTrashed()->findOrFail($id)->restore();
        Session::flash('message', 'El estudio ha sido activado exitosamente!!');
        return back();
    }

    //Index de eliminacion logicas
    public function desactivados()
    {
        return view('Admin.Estudios.desactivados', [
            'estudios' => Estudio::onlyTrashed()->get()
        ]);
    }

    //Eliminacion fisica
    public function eliminar($id)
    {
        Estudio::onlyTrashed()->find($id)->forceDelete();
        Session::flash('message2', 'Estudio eliminado permanentemente!!');
        return back();
    }
}
