<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\principalController;
use App\Http\Controllers\principalAdminController;
use App\Http\Controllers\doctorController;


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

/* Admin */
Route::get('templete',[principalAdminController::class,'templete']);
Route::get('nuevoDoctor',[doctorController::class,'nuevoDoctor']);
Route::POST('guardaDoctor',[doctorController::class,'guardaDoctor'])->name('guardaDoctor');;
