<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecursoUsuario extends Model
{
    protected $table = 'recursos_usuarios';
    protected $fillable = [
        'recurso_id',
        'usuario_id',
        'usuario_asigna_id',
    ];

    public function recurso() {
        return $this->belongsTo(Recurso::class);
    }
}
