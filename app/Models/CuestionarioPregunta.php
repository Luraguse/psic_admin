<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuestionarioPregunta extends Model
{
    protected $fillable = [
        'pregunta',
        "cuestionario_id",
    ];
    protected $table = "cuestionarios_preguntas";
    protected $casts = [
        'pregunta' => 'array',
    ];
}
