<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;
    protected $table = 'notificacion';
    protected $fillable = [
        'correo_de',
        'correo_para',
        'titulo',
        'mensaje',
        'imagen',
        'estado',
        'id_producto',
        'id_user',
    ];
}
