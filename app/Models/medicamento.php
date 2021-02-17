<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class medicamento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_medicamento';
    protected $fillable = [
        'nombre_med',
        'cant_disp',
        'costo'
    ];
    protected $dates = ['deleted_at'];
}
