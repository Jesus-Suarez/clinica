<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Session;

class medicamentoController extends Controller
{
    public function index()
    {
        return view('Admin.Medicamentos.index', [
            'medicamentos' => Medicamento::select()
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }

    public function crear(Request $request)
    {
        return view('Admin.Medicamentos.crear');
    }

    public function almacenar(Request $request)
    {
        $this->validate($request, [
            'nombre_med' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'cant_disp' => 'required|integer|numeric|between:0,5000',
            'costo' => 'required|between:0,9999.99',
            'foto_med' => 'image'

        ]);

        if ($request->hasFile('foto_med')) {
            $request->foto_med = $request->file('foto_med')->store('public'); //hacer el enlace php artisan storage:link
        }

        $med = new Medicamento();
        $med->nombre_med = $request->nombre_med;
        $med->cant_disp = $request->cant_disp;
        $med->costo = $request->costo;
        $med->foto_med = $request->foto_med;
        $med->save(); 

        Session::flash('message', 'El medicamento ' . $request->nombre_med . ' ha sido creado exitosamente!!');
        return redirect()->route('medicamento.index');
    }

    public function editar($id_medicamento)
    {
        $consulta = Medicamento::find($id_medicamento);
        return view('Admin.Medicamentos.editar')
            ->with('consulta', $consulta);
    }

    public function actualizar(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_med' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'cant_disp' => 'required|integer|numeric|between:0,5000',
            'costo' => 'required|between:0,9999.99'
        ]);

        $med = Medicamento::find($id);

        if ($request->hasFile('foto_med')) {
            Storage::delete($med->foto_med);
            $request->foto_med = $request->file('foto_med')->store('public');
            $med->foto_med = $request->foto_med;
        }


        $med->nombre_med = $request->nombre_med;
        $med->cant_disp = $request->cant_disp;
        $med->costo = $request->costo;
        $med->save();

        Session::flash('message', 'El medicamento ' . $request->nombre_med . ' ha sido modificado exitosamente!!');
        return redirect()->route('medicamento.index');
    }

    //eliminacion logica
    public function desactivar($id)
    {
        Medicamento::destroy($id);
        Session::flash('message3', 'El medicamento ha sido desactivado exitosamente!!');
        return back();
    }

    public function activar($id)
    {
        Medicamento::withTrashed()->findOrFail($id)->restore();
        Session::flash('message3', 'El medicamento ha sido activado exitosamente!!');
        return back();
    }

    //Index de eliminacion logicas
    public function desactivados()
    {
        return view('Admin.Medicamentos.desactivados', [
            'medicamentos' => Medicamento::onlyTrashed()->get()
        ]);
    }

    //Eliminacion fisica
    public function eliminar($id)
    {
        $medicamento = Medicamento::onlyTrashed()->find($id);

        Storage::delete($medicamento->foto_med);
        Medicamento::onlyTrashed()->find($id)->forceDelete();
        Session::flash('message2', 'Medicamento eliminado permanentemente!!');
        return back();
    }
}
