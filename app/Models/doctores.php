<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_doctor';
    protected $fillable = [
        'id_doctor',
        'nombre_doc',
        'ap_pat_doc',
        'ap_mat_doc',
        'sexo_doc',
        'fecha_nac',
        'telefono_doc',
        'tipo',
        'especialidad_id',
        'email_doc',
        'password_doc',
        'foto_doc'
    ];
    protected $dates = ['deleted_at'];
}
