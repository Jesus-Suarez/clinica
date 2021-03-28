<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;
use Session;

class consultorioController extends Controller
{
    public function index()
    {
        return view('Admin.Consultorios.index', [
            'consultorios' => Consultorio::select()
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }

    public function crear()
    {
        return view('Admin.Consultorios.crear');
    }

    public function almacenar(Request $request)
    {
        $this->validate($request, [
            'numero' => 'required|unique:consultorios|regex:/^[A-Z]{1}-[0-9]{2}$/'
        ]);

        Consultorio::create($request->all());

        Session::flash('message', 'El consultorio ' . $request->numero . ' ha sido creado exitosamente!!');
        return redirect()->route('consultorio.index');
    }

    public function editar(consultorio $consultorio)
    {
        return view('Admin.Consultorios.editar', [
            'consultorio' => $consultorio
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $this->validate($request, [
            'numero' => 'required|unique:consultorios|regex:/^[A-Z]{1}-[0-9]{2}$/'
        ]);

        $consultorio = Consultorio::find($id);
        $consultorio->numero = $request->numero;
        $consultorio->save();

        Session::flash('message', 'El consultorio ' . $request->numero . ' ha sido modificado exitosamente!!');
        return redirect()->route('consultorio.index');
    }

    //eliminacion logica
    public function desactivar($id)
    {
        Consultorio::destroy($id);
        Session::flash('message', 'El consultorio ha sido desactivado exitosamente!!');
        return back();
    }

    public function activar($id)
    {
        Consultorio::withTrashed()->findOrFail($id)->restore();
        Session::flash('message', 'El consultorio ha sido activado exitosamente!!');
        return back();
    }

    //Index de eliminacion logicas
    public function desactivados()
    {
        return view('Admin.Consultorios.desactivados', [
            'consultorios' => Consultorio::onlyTrashed()->get()
        ]);
    }

    //Eliminacion fisica
    public function eliminar($id)
    {
        Consultorio::onlyTrashed()->find($id)->forceDelete();
        Session::flash('message2', 'El consultorio ha sido eliminado permanentemente!!');
        return back();
    }
}
