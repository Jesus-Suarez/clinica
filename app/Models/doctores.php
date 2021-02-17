<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_doctores';
    protected $fillable = [
        'nombre_doc',
        'ap_pat_doc',
        'ap_mat_doc',
        'sexo_doc',
        'fecha_nac',
        'telefono_doc',
        'especialidad_id',
        'email_doc',
        'pass',
        'foto_doc'
    ];
    protected $dates = ['deleted_at'];
}
