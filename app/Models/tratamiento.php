<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tratamiento extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id_tratamiento';
    protected $fillable = [
        'descripcion_trat',
    ];
    protected $dates = ['deleted_at'];
}
