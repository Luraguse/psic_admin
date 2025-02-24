<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $fillable  = [
        'nombre',
        "doctor_id",
    ];
}
