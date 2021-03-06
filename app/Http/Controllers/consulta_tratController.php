<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consulta_tratamiento;


class consulta_tratController extends Controller
{
    public function nuevaConsulta_trat()
    {
        return view('Admin.Consultas_tratamientos.nuevaConsulta_trat');
    }

    public function guardaConsulta_trat(Request $request)
    {
        $id_consulta = $request->id_consulta;
        $id_estudio = $request->id_estudio;
        $id_medicamento = $request->id_medicamento;
        $cant_disp = $request->cant_disp;


        $this->validate($request, [
            'id_consulta' => 'required|integer',
            'id_estudio' => 'required|integer',
            'id_medicamento' => 'required|integer',
            'cant_med' => 'required|integer|max:50|regex:/^[1-9]*$/'
        ]);

        echo ("Datos correctos");
    }
}
