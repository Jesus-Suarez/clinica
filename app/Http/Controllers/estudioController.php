<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudio;


class estudioController extends Controller
{
    public function nuevoEstudio()
    {
        return view('Admin.Estudios.nuevoEstudio');
    }
    public function guardaEstudio(Request $request)
    {
        $nombre_est = $request->nombre_est;
        $descripcion_est = $request->descripcion_est;
        

        $this->validate($request, [
            'nombre_est' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'descripcion_est' => 'required|min:30|max:255|regex:/^[a-z,A-Z, ,á,é,í,ó,ú,ñ,.,]*$/'
        ]);


        echo ("Datos correctos");
    }
}
