<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class horarios extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_horario';
    protected $fillable = [
        'id_horario',
        'hora_inicio',
        'hora_fin',
    ];
    protected $dates = ['deleted_at'];
}
