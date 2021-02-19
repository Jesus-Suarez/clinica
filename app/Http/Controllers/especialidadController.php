<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class especialidadController extends Controller
{
    public function nuevaEspecialidad()
    {
        return view('Admin.Especialidades.nuevaEspecialidad');
    }

    public function guardarEspecialidad(Request $request)
    {
        $nombre_esp = $request->nombre_esp;

        $this->validate($request, [
            'nombre_esp' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
        ]);

        echo ("Datos correctos");
    }
}
