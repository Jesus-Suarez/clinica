<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class consulta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_consulta';
    protected $fillable = ['costo', 'id_cita', 'id_tratamiento'];
    protected $dates = ['deleted_at'];
}
