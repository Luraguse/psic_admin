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
//        return $this->hasOne(User::class, 'id', 'usuario_id')->select(["id", "name", "nivel"]);
    }
}
