<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuestionarioPaciente extends Model
{
    protected $fillable = [
        "cuestionario_id",
        "paciente_id",
        "respuestas"
    ];

    protected $table = "cuestionarios_pacientes";

    protected $casts = [
        'respuestas' => 'array',
    ];
}
