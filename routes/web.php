<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\principalController;
use App\Http\Controllers\principalAdminController;
use App\Http\Controllers\pacienteController;
use App\Http\Controllers\especialidadController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\horarioController;
use App\Http\Controllers\estudioController;
use App\Http\Controllers\medicamentoController;
use App\Http\Controllers\tratamientoController;
use App\Http\Controllers\consultorioController;
use App\Http\Controllers\diaController;
use App\Http\Controllers\citaController;
use App\Http\Controllers\consultaController;
use App\Http\Controllers\consulta_tratController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [principalController::class, 'index']);

/* --------------------- Admin -------------------*/

Route::get('templete', [principalAdminController::class, 'templete']);

/* Doctor */
Route::get('Doctores', [doctorController::class, 'Doctores'])->name('Doctores');
Route::get('nuevoDoctor', [doctorController::class, 'nuevoDoctor']);
Route::POST('guardaDoctor', [doctorController::class, 'guardaDoctor'])->name('guardaDoctor');
Route::get('modificaDoctor/{id_doctor}', [doctorController::class, 'modificaDoctor'])->name('modificaDoctor');
Route::POST('updateDoctor', [doctorController::class, 'updateDoctor'])->name('updateDoctor');
Route::get('DoctoresElim', [doctorController::class, 'DoctoresElim'])->name('DoctoresElim');
Route::get('desactivarDoctor/{id_doctor}', [doctorController::class, 'desactivarDoctor'])->name('desactivarDoctor');
Route::get('activarDoctor/{id_doctor}', [doctorController::class, 'activarDoctor'])->name('activarDoctor');
Route::get('eliminarDoctor/{id_doctor}', [doctorController::class, 'eliminarDoctor'])->name('eliminarDoctor');


/* Especialidad */
Route::get('Especialidades', [especialidadController::class, 'Especialidades'])->name('Especialidades');
Route::get('nuevaEspecialidad', [especialidadController::class, 'nuevaEspecialidad']);
Route::POST('guardaEspecialidad', [especialidadController::class, 'guardaEspecialidad'])->name('guardaEspecialidad');
Route::get('modificaEspecialidad/{especialidad_id}', [especialidadController::class, 'modificaEspecialidad'])->name('modificaEspecialidad');
Route::POST('updateEspecialidad', [especialidadController::class, 'updateEspecialidad'])->name('updateEspecialidad');
Route::get('EspecialidadesElim', [especialidadController::class, 'EspecialidadesElim'])->name('EspecialidadesElim');
Route::get('desactivarEspecialidad/{especialidad_id}', [especialidadController::class, 'desactivarEspecialidad'])->name('desactivarEspecialidad');
Route::get('activarEspecialidad/{especialidad_id}', [especialidadController::class, 'activarEspecialidad'])->name('activarEspecialidad');
Route::get('eliminarEspecialidad/{especialidad_id}', [especialidadController::class, 'eliminarEspecialidad'])->name('eliminarEspecialidad');


/* Paciente */
Route::get('pacientes', [pacienteController::class, 'index'])->name('paciente.index');
Route::get('pacientes/crear', [pacienteController::class, 'crear'])->name('paciente.crear');
Route::post('pacientes/almacenar', [pacienteController::class, 'almacenar'])->name('paciente.almacenar');
Route::get('pacientes/{paciente}/editar', [pacienteController::class, 'editar'])->name('paciente.editar');
Route::put('pacientes/{id}/actualizar', [pacienteController::class, 'actualizar'])->name('paciente.actualizar');
Route::delete('pacientes/{id}/desactivar', [pacienteController::class, 'desactivar'])->name('paciente.desactivar');
Route::get('pacientes/{id}/activar', [pacienteController::class, 'activar'])->name('paciente.activar');
Route::get('pacientes/desactivados', [pacienteController::class, 'desactivados'])->name('paciente.desactivados');
Route::delete('paciente/{id}/eliminar', [pacienteController::class, 'eliminar'])->name('paciente.eliminar');

/* Horario */
Route::get('Horarios', [horarioController::class, 'Horarios'])->name('Horarios');
Route::get('nuevoHorario', [horarioController::class, 'nuevoHorario']);
Route::POST('guardaHorario', [horarioController::class, 'guardaHorario'])->name('guardaHorario');
Route::get('modificaHorario/{id_horario}', [horarioController::class, 'modificaHorario'])->name('modificaHorario');
Route::POST('updateHorario', [horarioController::class, 'updateHorario'])->name('updateHorario');
Route::get('HorariosElim', [horarioController::class, 'HorariosElim'])->name('HorariosElim');
Route::get('desactivarHorario/{id_horario}', [horarioController::class, 'desactivarHorario'])->name('desactivarHorario');
Route::get('activarHorario/{id_horario}', [horarioController::class, 'activarHorario'])->name('activarHorario');
Route::get('eliminarHorario/{id_horario}', [horarioController::class, 'eliminarHorario'])->name('eliminarHorario');

Route::get('estudios/index', [estudioController::class, 'index'])->name('estudio.index');
Route::get('estudios/crear', [estudioController::class, 'crear'])->name('estudio.crear');
Route::POST('estudios/almacenar', [estudioController::class, 'almacenar'])->name('estudio.almacenar');
Route::get('estudios/{estudio}/editar', [estudioController::class, 'editar'])->name('estudio.editar');
Route::put('estudios/{id}/actualizar', [estudioController::class, 'actualizar'])->name('estudio.actualizar');
Route::delete('estudios/{id}/desactivar', [estudioController::class, 'desactivar'])->name('estudio.desactivar');
Route::get('estudios/{id}/activar', [estudioController::class, 'activar'])->name('estudio.activar');
Route::get('estudios/desactivados', [estudioController::class, 'desactivados'])->name('estudio.desactivados');
Route::delete('estudios/{id}/eliminar', [estudioController::class, 'eliminar'])->name('estudio.eliminar');

Route::get('nuevoMedicamento', [medicamentoController::class, 'nuevoMedicamento']);
Route::POST('guardaMedicamento', [medicamentoController::class, 'guardaMedicamento'])->name('guardaMedicamento');

/* Tratamiento */
Route::get('Tratamientos', [tratamientoController::class, 'Tratamientos'])->name('Tratamientos');
Route::get('nuevoTratamiento', [tratamientoController::class, 'nuevoTratamiento']);
Route::POST('guardaTratamiento', [tratamientoController::class, 'guardaTratamiento'])->name('guardaTratamiento');
Route::get('modificaTratamiento/{id_tratamiento}', [tratamientoController::class, 'modificaTratamiento'])->name('modificaTratamiento');
Route::POST('updateTratamiento', [tratamientoController::class, 'updateTratamiento'])->name('updateTratamiento');
Route::get('TratamientosElim', [tratamientoController::class, 'TratamientosElim'])->name('TratamientosElim');
Route::get('desactivarTratamiento/{id_tratamiento}', [tratamientoController::class, 'desactivarTratamiento'])->name('desactivarTratamiento');
Route::get('activarTratamiento/{id_tratamiento}', [tratamientoController::class, 'activarTratamiento'])->name('activarTratamiento');
Route::get('eliminarTratamiento/{id_tratamiento}', [tratamientoController::class, 'eliminarTratamiento'])->name('eliminarTratamiento');

Route::get('dias/index', [diaController::class, 'index'])->name('dia.index');
Route::get('dias/crear', [diaController::class, 'crear'])->name('dia.crear');
Route::POST('dias/almacenar', [diaController::class, 'almacenar'])->name('dia.almacenar');
Route::get('dias/{id_dia}/editar', [diaController::class, 'editar'])->name('dia.editar');
Route::put('dias/{id}/actualizar', [diaController::class, 'actualizar'])->name('dia.actualizar');
Route::delete('dias/{id}/desactivar', [diaController::class, 'desactivar'])->name('dia.desactivar');
Route::get('dias/{id}/activar', [diaController::class, 'activar'])->name('dia.activar');
Route::get('dias/desactivados', [diaController::class, 'desactivados'])->name('dia.desactivados');
Route::delete('dias/{id}/eliminar', [diaController::class, 'eliminar'])->name('dia.eliminar');

/* Consulta Tratamiento */
Route::get('nuevaConsulta_trat', [consulta_tratController::class, 'nuevaConsulta_trat']);
Route::POST('guardaConsulta_trat', [consulta_tratController::class, 'guardaConsulta_trat'])->name('guardaConsulta_trat');

/* Consultorio */
Route::get('nuevoConsultorio', [consultorioController::class, 'nuevoConsultorio']);
Route::POST('guardaConsultorio', [consultorioController::class, 'guardaConsultorio'])->name('guardaConsultorio');


Route::get('nuevaCita', [citaController::class, 'nuevaCita']);
Route::POST('guardaCita', [citaController::class, 'guardaCita'])->name('guardaCita');

/* Consulta */
Route::get('nuevaConsulta', [consultaController::class, 'nuevaConsulta']);
Route::POST('guardaConsulta', [consultaController::class, 'guardaConsulta'])->name('guardaConsulta');

Route::get('nuevaEspecialidad', [especialidadController::class, 'nuevaEspecialidad']);
Route::POST('guardarEspecialidad', [especialidadController::class, 'guardarEspecialidad'])->name('guardarEspecialidad');

Route::get('nuevoTratamiento', [tratamientoController::class, 'nuevoTratamiento']);
Route::POST('guardaTratamiento', [tratamientoController::class, 'guardaTratamiento'])->name('guardaTratamiento');
