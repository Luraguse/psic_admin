<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = [
        'comentador_id',
        'texto',
        'doctor_id',
        "paciente_id",
    ];

    protected $table = 'bitacora';

    public function comentador() {
        return $this->belongsTo('App\Models\User', 'comentador_id', 'id');
    }

    public function doctor() {
        return $this->belongsTo('App\Models\User', 'doctor_id', 'id');
    }

    public function comentarios() {
        return $this->hasMany('App\Models\ComentarioBitacora', 'bitacora_id', 'id');
    }
}
