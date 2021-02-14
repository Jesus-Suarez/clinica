<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudio extends Model
{
    protected $fillable = [
        'nombre_est',
        'descripcion_est',
    ];
}
