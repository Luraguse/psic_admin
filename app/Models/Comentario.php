<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        "texto", "diario_pensamiento_id", "usuario_id"
    ];


    public function usuario() {
        return $this->hasOne(User::class, 'id', 'usuario_id')->select(["id", "name", "nivel"]);
    }

    public function diario_pensamiento() {
        return $this->belongsTo(DiarioPensamiento::class, 'diario_pensamiento_id', 'id');
    }
}
