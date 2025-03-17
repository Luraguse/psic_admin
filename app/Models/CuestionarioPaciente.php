<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuestionarioPaciente extends Model
{
    protected $fillable = [
        "cuestionario_id",
        "paciente_id",
        "respuestas",
        "terminado"
    ];

    protected $table = "cuestionarios_pacientes";

    protected $casts = [
        'respuestas' => 'array',
    ];

    public function cuestionario() {
        return $this->hasOne(Cuestionario::class, 'id', 'cuestionario_id')->select(["id", "nombre"]);
    }

    public function evaluacion() {
        return $this->hasOne(Evaluacion::class, "resource_id", "id")->where("tipo", "cuestionario");
    }
}
