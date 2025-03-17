<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $fillable = [
        "usuario_evaluador_id",
        "evaluacion",
        "resource_id",
        "tipo",
    ];
}
