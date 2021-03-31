<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_cita';
    protected $fillable = ['fecha_cita', 'hora', 'id_doctor', 'id_paciente', 'id_consultorio'];
}
