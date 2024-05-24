<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;


    protected $fillable = [
        'cantidad_disponible',
        'numero_producto',
        'nombre_producto',
        'imagen_producto',
        'descripcion_producto',
        'precio_producto',
        'precio_producto_max',
        'codigo_nandina',
        'estrella',
        'estado_producto',
        'id_rubro',
        'id_categoria',
        'id_unidad_medida',
        'id_moneda',
        'id_empresa',
        'id_user',
    ];
}
