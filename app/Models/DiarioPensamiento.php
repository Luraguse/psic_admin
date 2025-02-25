<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiarioPensamiento extends Model
{
    protected $fillable = ["texto", "usuario_id", "paciente_id"];
    protected $table = "diario_pensamientos";
}
