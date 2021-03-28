<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class consultaController extends Controller
{
    public function nuevaConsulta()
    {
        return view('Admin.Consultas.nuevaConsulta');
    }

    public function guardaConsulta(Request $request)
    {
        $costo = $request->costo;
        $id_cita = $request->id_cita;
        $id_tratamiento = $request->id_tratamiento;

        $this->validate($request, [
            'costo' => 'required|numeric|min:0',
            'id_cita' => 'required|numeric',
            'id_tratamiento' => 'required|numeric',
        ]);

        echo ("Datos correctos");
    }
}
