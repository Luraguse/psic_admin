<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = [
        'user_id',
        'perfil',
    ];
    public $table = 'perfiles';
}
