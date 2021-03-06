<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_dia';
    protected $fillable = ['nombre_dia', 'id_doctor', 'id_horario'];
}
