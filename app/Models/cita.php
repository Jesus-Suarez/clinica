<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    //use HasFactory;
    protected $fillable = ['fecha_cita', 'hora', 'id_doctor', 'id_paciente', 'id_consultorio'];
}
