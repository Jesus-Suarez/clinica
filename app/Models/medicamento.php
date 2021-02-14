<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicamento extends Model
{
    protected $fillable = [
        'nombre_med',
        'cant_disp',
        'costo'
    ];
}
