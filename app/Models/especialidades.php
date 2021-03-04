<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class especialidades extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'especialidad_id';
    protected $fillable = [
        'especialidad_id',
        'nombre_esp'
    ];
    protected $dates = ['deleted_at'];
}
 