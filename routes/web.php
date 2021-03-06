<?php

use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/acceder', [LoginController::class, 'acceder'])->name('login.acceder');

/* --------------------- Admin -------------------*/

Route::get('templete', [principalAdminController::class, 'templete']);

Route::group(
    ['middleware' => ['loginEntrar']],
    function () {

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

        Route::get('pacientes', [pacienteController::class, 'index'])->name('paciente.index');
        Route::get('pacientes/crear', [pacienteController::class, 'crear'])->name('paciente.crear');
        Route::post('pacientes/almacenar', [pacienteController::class, 'almacenar'])->name('paciente.almacenar');
        Route::get('pacientes/{paciente}/editar', [pacienteController::class, 'editar'])->name('paciente.editar');
        Route::put('pacientes/{id}/actualizar', [pacienteController::class, 'actualizar'])->name('paciente.actualizar');
        Route::delete('pacientes/{id}/desactivar', [pacienteController::class, 'desactivar'])->name('paciente.desactivar');
        Route::get('pacientes/{id}/activar', [pacienteController::class, 'activar'])->name('paciente.activar');
        Route::get('pacientes/desactivados', [pacienteController::class, 'desactivados'])->name('paciente.desactivados');
        Route::delete('pacientes/{id}/eliminar', [pacienteController::class, 'eliminar'])->name('paciente.eliminar');

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

        Route::get('medicamentos/index', [medicamentoController::class, 'index'])->name('medicamento.index');
        Route::get('medicamentos/crear', [medicamentoController::class, 'crear'])->name('medicamento.crear');
        Route::POST('medicamentos/almacenar', [medicamentoController::class, 'almacenar'])->name('medicamento.almacenar');
        Route::get('medicamentos/{medicamento}/editar', [medicamentoController::class, 'editar'])->name('medicamento.editar');
        Route::put('medicamentos/{id}/actualizar', [medicamentoController::class, 'actualizar'])->name('medicamento.actualizar');
        Route::delete('medicamentos/{id}/desactivar', [medicamentoController::class, 'desactivar'])->name('medicamento.desactivar');
        Route::get('medicamentos/{id}/activar', [medicamentoController::class, 'activar'])->name('medicamento.activar');
        Route::get('medicamentos/desactivados', [medicamentoController::class, 'desactivados'])->name('medicamento.desactivados');
        Route::delete('medicamentos/{id}/eliminar', [medicamentoController::class, 'eliminar'])->name('medicamento.eliminar');

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
        Route::get('dias/{id}/editar', [diaController::class, 'editar'])->name('dia.editar');
        Route::put('dias/{id}/actualizar', [diaController::class, 'actualizar'])->name('dia.actualizar');
        Route::delete('dias/{id}/desactivar', [diaController::class, 'desactivar'])->name('dia.desactivar');
        Route::get('dias/{id}/activar', [diaController::class, 'activar'])->name('dia.activar');
        Route::get('dias/desactivados', [diaController::class, 'desactivados'])->name('dia.desactivados');
        Route::delete('dias/{id}/eliminar', [diaController::class, 'eliminar'])->name('dia.eliminar');

        Route::get('nuevaConsulta_trat', [consulta_tratController::class, 'nuevaConsulta_trat']);
        Route::POST('guardaConsulta_trat', [consulta_tratController::class, 'guardaConsulta_trat'])->name('guardaConsulta_trat');

        Route::get('consultorios/index', [consultorioController::class, 'index'])->name('consultorio.index');
        Route::get('consultorios/crear', [consultorioController::class, 'crear'])->name('consultorio.crear');
        Route::post('consultorios/almacenar', [consultorioController::class, 'almacenar'])->name('consultorio.almacenar');
        Route::get('consultorios/{consultorio}/editar', [consultorioController::class, 'editar'])->name('consultorio.editar');
        Route::put('consultorios/{id}/actualizar', [consultorioController::class, 'actualizar'])->name('consultorio.actualizar');
        Route::delete('consultorios/{id}/desactivar', [consultorioController::class, 'desactivar'])->name('consultorio.desactivar');
        Route::get('consultorios/{id}/activar', [consultorioController::class, 'activar'])->name('consultorio.activar');
        Route::get('consultorios/desactivados', [consultorioController::class, 'desactivados'])->name('consultorio.desactivados');
        Route::delete('consultorios/{id}/eliminar', [consultorioController::class, 'eliminar'])->name('consultorio.eliminar');

        Route::get('citas/index', [citaController::class, 'index'])->name('cita.index');
        Route::get('citas/crear', [citaController::class, 'crear'])->name('cita.crear');
        Route::POST('citas/almacenar', [citaController::class, 'almacenar'])->name('cita.almacenar');
        Route::get('citas/{id}/editar', [citaController::class, 'editar'])->name('cita.editar');
        Route::put('citas/{id}/actualizar', [citaController::class, 'actualizar'])->name('cita.actualizar');
        Route::delete('citas/{id}/desactivar', [citaController::class, 'desactivar'])->name('cita.desactivar');
        Route::get('citas/{id}/activar', [citaController::class, 'activar'])->name('cita.activar');
        Route::get('citas/desactivados', [citaController::class, 'desactivados'])->name('cita.desactivados');
        Route::delete('citas/{id}/eliminar', [citaController::class, 'eliminar'])->name('cita.eliminar');

        Route::get('consultas/index', [consultaController::class, 'index'])->name('consulta.index');
        Route::get('consultas/crear', [consultaController::class, 'crear'])->name('consulta.crear');
        Route::POST('consultas/almacenar', [consultaController::class, 'almacenar'])->name('consulta.almacenar');
        Route::get('consultas/{id}/editar', [consultaController::class, 'editar'])->name('consulta.editar');
        Route::put('consultas/{id}/actualizar', [consultaController::class, 'actualizar'])->name('consulta.actualizar');
        Route::delete('consultas/{id}/desactivar', [consultaController::class, 'desactivar'])->name('consulta.desactivar');
        Route::get('consultas/{id}/activar', [consultaController::class, 'activar'])->name('consulta.activar');
        Route::get('consultas/desactivados', [consultaController::class, 'desactivados'])->name('consulta.desactivados');
        Route::delete('consultas/{id}/eliminar', [consultaController::class, 'eliminar'])->name('consulta.eliminar');

        //Cerra sesion
        Route::get('salir', [LoginController::class, 'salir'])->name('login.salir');
    }
);
