<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;

    protected $table = 'rubro';
    protected $primaryKey = 'id_rubro';
    
    protected $fillable = [
        'nombre_rubro',
        'abreviacion_rubro',
        'imagen_rubro',
        'estado',
    ];
}
