<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctores;

class doctorController extends Controller
{
    public function nuevoDoctor()
    {
        return view('Admin.Doctor.nuevoDoctor');
    }
    public function guardaDoctor(Request $request)
    {
        $nombre_doc = $request->nombre_doc;
        $ap_pat_doc = $request->ap_pat_doc;
        $ap_mat_doc = $request->ap_mat_doc;
        $sexo_doc = $request->sexo_doc;
        $fecha_nac = $request->fecha_nac;
        $telefono_doc = $request->telefono_doc;
        $especialidad_id = $request->especialidad_id;
        $email_doc = $request->email_doc;
        $pass = $request->pass;
        $foto_doc = $request->foto_doc;

        $this->validate($request, [
            'nombre_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_pat_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_mat_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'sexo_doc' => 'required',
            'fecha_nac' => 'required',
            'telefono_doc' => 'required|regex:/^[0-9]{10}$/',
            'especialidad_id' => 'required|integer|not_in:0',
            'email_doc' => 'required|email',
            'pass' => 'required|password|regex:/^[A-Z,a-z,0-9,á,é,í,ó,ú,ñ]*$/',
            'foto_doc' => 'required|mimes:jpeg,png,jpg,gif'


        ]);


        echo ("Datos correctos");
    }
}
