<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    protected $fillable = [
        'hora_inicio',
        'hora_fin',
    ];
}
