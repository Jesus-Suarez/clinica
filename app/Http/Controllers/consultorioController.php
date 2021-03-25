<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class consultorioController extends Controller
{
    public function nuevoConsultorio()
    {
        return view('Admin.Consultorios.nuevoConsultorio');
    }
    public function guardaConsultorio(Request $request)
    {
        $numero = $request->numero;
       

        $this->validate($request, [
            'numero' => 'required|regex:/^[A-Z]{1}-[0-9]{2}$/'
           
        ]);


        echo ("Datos correctos");
    }
}
