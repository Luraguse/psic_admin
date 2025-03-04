<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiarioPensamiento extends Model
{
    protected $fillable = ["texto", "usuario_id", "paciente_id"];
    protected $table = "diario_pensamientos";

    public function usuario() {
        return $this->hasOne(User::class, 'id', 'usuario_id')->select(["id", "name", "nivel"]);
    }

    public function comentarios() {
        return $this->hasMany(Comentario::class, 'diario_pensamiento_id', 'id');
    }
}
