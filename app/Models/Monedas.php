<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monedas extends Model
{
    use HasFactory;

    protected $table = 'monedas';
    protected $primaryKey = 'id_moneda';

    protected $fillable = [
        'nombre_moneda',
        'abrv_moneda',
        'descripcion_moneda',
        'estado',
    ];
}
