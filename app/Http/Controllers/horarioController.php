<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horarios;
use Session;

class horarioController extends Controller
{
    public function Horarios()
    {
        $horario = horarios::orderBy('hora_inicio')->get();
        return view('Admin.Horarios.Horarios')
            ->with('horario', $horario);
    }
    public function nuevoHorario()
    {
        return view('Admin.Horarios.nuevoHorario');
    }

    public function guardaHorario(Request $request)
    {
        $this->validate($request, [
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $hor = new horarios();
        $hor->hora_inicio = $request->hora_inicio;
        $hor->hora_fin = $request->hora_fin;
        $hor->save();
        Session::flash('message', 'Horario agregado satisfactoriamente!');
        return redirect()->route('Horarios');
    }

    public function modificaHorario($id_horario)
    {
        $consulta = horarios::find($id_horario);
        return view('Admin.Horarios.modificaHorario')
            ->with('consulta', $consulta);
    }
    public function updateHorario(Request $request)
    {
        $id_horario = $request->id_horario;

        $this->validate($request, [
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);


        $hor = horarios::find($id_horario);
        $hor->hora_inicio = $request->hora_inicio;
        $hor->hora_fin = $request->hora_fin;
        $hor->save();
        Session::flash('message', 'El horario se modifico satisfactoriamente!');
        return redirect()->route('Horarios');
    }

    public function desactivarHorario($id_horario)
    {
        $horario = horarios::find($id_horario)->delete();
        Session::flash('message3', 'El horario fue desactivado correctamente!');
        return redirect()->route('Horarios');
    }

    public function activarHorario($id_horario)
    {
        $horario=horarios::onlyTrashed()->where('id_horario',$id_horario)->restore();
        Session::flash('message', 'El horario fue activado correctamente!');
        return redirect()->route('Horarios');
    }

    public function HorariosElim()
    {
        $horario = horarios::onlyTrashed()->orderBy('hora_inicio')->get();
        return view('Admin.Horarios.HorariosElim')
            ->with('horario', $horario);
    }
    public function eliminarHorario($id_horario)
    {
        $horarios = horarios::onlyTrashed()->find($id_horario)->forceDelete();
        Session::flash('message2', 'El horario fue eliminado permanentemente!');
        return redirect()->route('Horarios');
    }
}
