<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class medicamentoController extends Controller
{
    public function nuevoMedicamento()
    {
        return view('Admin.Medicamentos.nuevoMedicamento');
    }
    public function guardaMedicamento(Request $request)
    {
        $nombre_med = $request->nombre_med;
        $cant_disp = $request->cant_disp;
        $costo = $request->costo;

        $this->validate($request, [
            'nombre_med' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'cant_disp' => 'required|integer|regex:/^[0-9]{3}$/',
            'costo' => 'required|integer|regex:/^[0-9]*$/'
        ]);


        echo ("Datos correctos");
    }
}
