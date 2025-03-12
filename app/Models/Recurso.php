<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'liga',
        'usuario_id',
        "terminado"
    ];

    public function usuario() {
        return $this->belongsTo(User::class, "usuario_id", "id");
    }
}
