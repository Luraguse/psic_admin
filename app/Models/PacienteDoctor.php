<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacienteDoctor extends Model
{
    protected $table = 'pacientes_doctores';
    protected $fillable = ['paciente_id', 'doctor_id'];
    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }

    public function paciente() {
        return $this->belongsTo(User::class, 'paciente_id', 'id');
    }
}
