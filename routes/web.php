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

Route::get('index',[principalController::class,'index']);

/* --------------------- Admin -------------------*/

Route::get('templete',[principalAdminController::class,'templete']);

/* Doctor */
Route::get('nuevoDoctor',[doctorController::class,'nuevoDoctor']);
Route::POST('guardaDoctor',[doctorController::class,'guardaDoctor'])->name('guardaDoctor');

/* Especialidad */
Route::get('nuevaEspecialidad',[especialidadController::class,'nuevaEspecialidad']);
Route::POST('guardaEspecialidad',[especialidadController::class,'guardaEspecialidad'])->name('guardaEspecialidad');

/* Paciente */
Route::get('nuevoPaciente',[pacienteController::class,'nuevoPaciente']);
Route::POST('guardaPaciente',[pacienteController::class,'guardaPaciente'])->name('guardaPaciente');

/* Horario */
Route::get('nuevoHorario',[horarioController::class,'nuevoHorario']);
Route::POST('guardaHorario',[horarioController::class,'guardaHorario'])->name('guardaHorario');

/* Estudio */
Route::get('nuevoEstudio',[estudioController::class,'nuevoEstudio']);
Route::POST('guardaEstudio',[estudioController::class,'guardaEstudio'])->name('guardaEstudio');

/* Medicamento */
Route::get('nuevoMedicamento',[medicamentoController::class,'nuevoMedicamento']);
Route::POST('guardaMedicamento',[medicamentoController::class,'guardaMedicamento'])->name('guardaMedicamento');

/* Tratamiento */
Route::get('nuevoTratamiento',[tratamientoController::class,'nuevoTratamiento']);
Route::POST('guardaTratamiento',[tratamientoController::class,'guardaTratamiento'])->name('guardaTratamiento');
