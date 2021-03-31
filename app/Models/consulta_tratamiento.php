<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class consulta_tratamiento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_cons_trat';
    protected $fillable = ['cant_med', 'id_consulta', 'id_estudio', 'id_medicamento'];
    protected $dates = ['deleted_at'];
}
