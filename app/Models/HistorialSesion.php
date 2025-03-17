<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialSesion extends Model
{
    protected $table = 'historial_sesiones';
    protected $fillable = [
        "paciente_id",
        "doctor_id",
        "mensaje"
    ];
}
