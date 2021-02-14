<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta_tratamiento extends Model
{
    //use HasFactory;
    protected $fillable = ['cant_disp', 'id_consulta', 'id_estudio', 'id_medicamento'];
}
