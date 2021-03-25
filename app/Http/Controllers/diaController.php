<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dia;


class diaController extends Controller
{
    public function nuevoDia()
    {
        return view('Admin.Dias.nuevoDia');
    }
    public function guardaDia(Request $request)
    {
        $nombre_dia = $request->nombre_dia;
        $id_doctor = $request->id_doctor;
        $id_horario = $request->id_horario;
      

        $this->validate($request, [
            'nombre_dia' => 'required|string|not_in:0',
            'id_doctor' => 'required|integer|not_in:0',
            'id_horario' => 'required|integer|not_in:0',
        ]);

        echo ("Datos correctos");
    }
}
