<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tratamientoController extends Controller
{
    public function nuevoTratamiento()
    {
        return view('Admin.Tratamientos.nuevoTratamiento');
    }

    public function guardaTratamiento(Request $request)
    {
        $descripcion_trat = $request->descripcion_trat;

        $this->validate($request, [
            'descripcion_trat' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
        ]);

        echo ("Datos correctos");
    }
}
