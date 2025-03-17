<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TareaPaciente extends Model
{
    protected $table = "tareas_pacientes";
    protected $fillable = [
        "id_tarea",
        "paciente_id",
        "doctor_id",
        "respuesta",
        "recurso",
        "terminado"
    ];

    public function paciente() {
        return $this->belongsTo(User::class, "paciente_id", "id");
    }

    public function doctor() {
        return $this->belongsTo(User::class, "doctor_id", "id");
    }

    public function tarea() {
        return $this->belongsTo(Tarea::class, "id_tarea", "id");
    }

    public function evaluacion() {
        return $this->hasOne(Evaluacion::class, "resource_id", "id")->where("tipo", "tarea");
    }
}
