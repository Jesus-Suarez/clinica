<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    protected $fillable = [
        'nombre_pac',
        'ap_pat_pac',
        'ap_mat_pac',
        'telefono_pac',
        'email_pac',
        'password',
        'foto_pac',
        'estado',
        'municipio',
        'cp',
        'calle',
        'numero',
    ];
}
