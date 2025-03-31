<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComentarioBitacora extends Model
{
    protected $table = 'comentario_bitacora';
    protected $fillable = [
        "bitacora_id",
        "doctor_id",
        "texto",
    ];

    public function doctor() {
        return $this->belongsTo('App\Models\User', 'doctor_id', 'id');
    }
}
