<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctores extends Model
{
    protected $fillable = [
        'nombre_doc',
        'ap_pat_doc',
        'ap_mat_doc',
        'telefono_doc',
        'email_doc',
        'password',
        'foto_doc',
        'especialidad'
    ];
}
