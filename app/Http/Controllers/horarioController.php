<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class horarioController extends Controller
{
    public function nuevoHorario()
    {
        return view('Admin.Horarios.nuevoHorario');
    }

    public function guardaHorario(Request $request)
    {
        $hora_inicio = $request->hora_inicio;
        $hora_fin = $request->hora_fin;

        $this->validate($request, [
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        echo ("Datos correctos");
    }
}
