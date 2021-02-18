<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class citaController extends Controller
{
    public function nuevaCita()
    {
        return view('Admin.Citas.nuevaCita');
    }

    public function guardaCita(Request $request)
    {
        $fecha_cita = $request->fecha_cita;
        $hora = $request->hora;
        $id_doctor = $request->id_doctor;
        $id_paciente = $request->id_paciente;
        $id_consultorio = $request->id_consultorio;

        $this->validate($request, [
            'fecha_cita' => 'required|date',
            'hora' => 'required',
            'id_doctor' => 'required|numeric',
            'id_paciente' => 'required|numeric',
            'id_consultorio' => 'required|numeric',
        ]);

        echo ("Datos correctos");
    }
}
