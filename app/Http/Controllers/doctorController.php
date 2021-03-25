<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctores;
use App\Models\especialidades;
use Session;

class doctorController extends Controller
{
    public function Doctores()
    {
        $consulta = doctores::join("especialidades", "especialidades.especialidad_id", "=", "doctores.especialidad_id")
            ->select(
                'doctores.foto_doc',
                'doctores.id_doctor',
                'doctores.nombre_doc',
                'doctores.ap_pat_doc',
                'doctores.ap_mat_doc',
                'doctores.fecha_nac',
                'doctores.sexo_doc',
                'doctores.telefono_doc',
                'especialidades.nombre_esp as espec',
                'doctores.email_doc'
            )
            ->get();


        return view('Admin.Doctor.Doctores')
            ->with('consulta', $consulta);
    }
    public function nuevoDoctor()
    {
        $especialidad = especialidades::orderBy('nombre_esp')->get();
        return view('Admin.Doctor.nuevoDoctor')->with('especialidad', $especialidad);
    }
    public function guardaDoctor(Request $request)
    {

        $this->validate($request, [
            'nombre_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_pat_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_mat_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'sexo_doc' => 'required',
            'fecha_nac' => 'required',
            'telefono_doc' => 'required|regex:/^[0-9]{10}$/',
            'especialidad_id' => 'required|integer|not_in:0',
            'email_doc' => 'required|email|unique:doctores,email_doc',
            'pass' => 'required|regex:/^[A-Z,a-z,0-9,á,é,í,ó,ú,ñ]*$/',
            'foto_doc' => 'mimes:jpeg,png,jpg,gif'

        ]);

        $doc = new doctores;
        $doc->nombre_doc = $request->nombre_doc;
        $doc->ap_pat_doc = $request->ap_pat_doc;
        $doc->ap_mat_doc = $request->ap_mat_doc;
        $doc->sexo_doc = $request->sexo_doc;
        $doc->fecha_nac = $request->fecha_nac;
        $doc->telefono_doc = $request->telefono_doc;
        $doc->especialidad_id = $request->especialidad_id;
        $doc->email_doc = $request->email_doc;
        $doc->pass = $request->pass;
        $doc->save();
        Session::flash('message', 'Doctor: ' . $doc->nombre_doc . ' se agrego satisfactoriamente!');
        return redirect()->route('Doctores');
    }
    public function modificaDoctor($id_doctor)
    {
        $consulta = doctores::join("especialidades", "doctores.especialidad_id", "=", "especialidades.especialidad_id")
            ->select(
                'doctores.id_doctor',
                'doctores.foto_doc',
                'doctores.nombre_doc',
                'doctores.ap_pat_doc',
                'doctores.ap_mat_doc',
                'doctores.fecha_nac',
                'doctores.sexo_doc',
                'doctores.telefono_doc',
                'especialidades.nombre_esp as espec',
                'especialidades.especialidad_id',
                'doctores.email_doc',
                'doctores.pass'
            )
            ->where('id_doctor', $id_doctor)->get();
        $especialidades = especialidades::all();
        return view('Admin.Doctor.modificaDoctor')
            ->with('consulta', $consulta[0])
            ->with('especialidades', $especialidades);
    }
    public function updateDoctor(Request $request)
    {
        $id_doctor = $request->id_doctor;

        $this->validate($request, [
            'nombre_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_pat_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'ap_mat_doc' => 'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,ú,ñ]*$/',
            'sexo_doc' => 'required',
            'fecha_nac' => 'required',
            'telefono_doc' => 'required|regex:/^[0-9]{10}$/',
            'especialidad_id' => 'required|integer|not_in:0',
            'email_doc' => 'required|email',
            'pass' => 'required|regex:/^[A-Z,a-z,0-9,á,é,í,ó,ú,ñ]*$/',
            'foto_doc' => 'required|mimes:jpeg,png,jpg,gif'

        ]);

        $doc = doctores::find($id_doctor);
        $doc->nombre_doc = $request->nombre_doc;
        $doc->ap_pat_doc = $request->ap_pat_doc;
        $doc->ap_mat_doc = $request->ap_mat_doc;
        $doc->sexo_doc = $request->sexo_doc;
        $doc->fecha_nac = $request->fecha_nac;
        $doc->telefono_doc = $request->telefono_doc;
        $doc->especialidad_id = $request->especialidad_id;
        $doc->email_doc = $request->email_doc;
        $doc->pass = $request->pass;
        $doc->save();
        Session::flash('message', 'El doctor fue modificado correctamente!!!');
        return redirect()->route('Doctores');
    }
    public function desactivarDoctor($id_doctor)
    {
        $doctor = doctores::find($id_doctor)->delete();
        Session::flash('message3', 'El doctor fue desactivado correctamente!');
        return redirect()->route('Doctores');
    }

    public function activarDoctor($id_doctor)
    {
        $doctor = doctores::onlyTrashed()->where('id_doctor', $id_doctor)->restore();
        Session::flash('message', 'El doctor fue activado correctamente!');
        return redirect()->route('Doctores');
    }

    public function DoctoresElim()
    {
        $doctor = doctores::onlyTrashed()->get();
        return view('Admin.Doctor.DoctoresElim')
            ->with('doctor', $doctor);
    }

    public function eliminarDoctor($especialidad_id)
    {
        /*** $buscadoc=doctores::where('especialidad_id',$especialidad_id)->get();
        $cuantos= count($buscadoc);
        if($cuantos==0){
         */
        $doctores = doctores::onlyTrashed()->find($especialidad_id)->forceDelete();
        Session::flash('message2', 'La especialidad fue eliminada permanentemente!');
        return redirect()->route('Doctores');
        //  }
        // else{
        //   Session::flash('message2', 'La especialidad no puede ser eliminada ya que tiene registros en doctores!');
        // return redirect()->route('EspecialidadesElim');
        //}  
    }
}
