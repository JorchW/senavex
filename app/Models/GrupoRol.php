<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoRol extends Model
{
    use HasFactory;

    protected $table = 'grupo_rol';

    protected $fillable = [
        'id_user',
        'id_rol',
    ];
}
