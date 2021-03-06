<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_estudio';
    protected $fillable = [
        'nombre_est',
        'descripcion_est',
    ];
    protected $dates = ['deleted_at'];
}
