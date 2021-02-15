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
        'telefono_doc',
        'email_doc',
        'password',
        'foto_doc',
        'especialidad'
    ];
    protected $dates = ['deleted_at'];
}
