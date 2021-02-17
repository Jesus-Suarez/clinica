<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class consultorio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_consultorio';
    protected $fillable = ['numero'];
    protected $dates = ['deleted_at'];
}
