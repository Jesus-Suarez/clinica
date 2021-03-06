<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_paciente';
    protected $fillable = [
        'nombre_pac',
        'ap_pat_pac',
        'ap_mat_pac',
        'fecha_nac',
        'sexo_pac',
        'telefono_pac',
        'email_pac',
        'password_pac',
        'foto_pac',
        'estado',
        'municipio',
        'cp',
        'calle',
        'numero',
    ];
}
