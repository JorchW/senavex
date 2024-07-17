<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoRubro extends Model
{
    use HasFactory;
    protected $table = 'grupo_rubro';
    protected $fillable = [
        'id_empresa',
        'id_rubro',
    ];
}
