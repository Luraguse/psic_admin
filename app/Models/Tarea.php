<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        "id_doctor",
        "nombre",
        "tarea",
    ];

    public function doctor() {
        return $this->belongsTo(User::class, "id_doctor", "id");
    }
}
