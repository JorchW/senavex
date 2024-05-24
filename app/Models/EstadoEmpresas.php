<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoEmpresas extends Model
{
    use HasFactory;

    protected $table = 'estado_empresas';
    protected $primaryKey = 'id_estado_empresa';

    protected $fillable = [
        'id_estado_empresa',
        'estado_empresa',
    ];
}
