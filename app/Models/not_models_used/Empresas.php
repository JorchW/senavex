<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'id_empresa';

    protected $fillable = [
        'id_empresa',
        'razon_social',
        'descripcion_empresa',
        'nit',
        'matricula', 
        'telefono',
        'celular',
        //'nombre_1',
        //'celular_2',
        //'nombre_2',
        'email',
        'pag_web',
        //'ruex',
        //'estado_ruex',
        //'imagen_empresa',
        'direccion_descriptiva',
        'direccion_fiscal',
        //'facebook',
        //'tiktok',
        //'whatsapp',
        //'logo_empresa',
        //'id_estado_empresa',
        //'estado',
    ];
}
