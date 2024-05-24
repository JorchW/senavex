<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedidas extends Model
{
    use HasFactory;

    protected $table = 'unidad_medidas';
    protected $primaryKey = 'id_unidad_medida';

    protected $fillable = [
        'nombre_unidad_medida',
        'abrv_unidad_medida',
        'descripcion_unidad_medida',
        'estado',
    ];
}
