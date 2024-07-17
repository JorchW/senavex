<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEmpresaUser extends Model
{
    use HasFactory;


    protected $table = 'grupo_empresa_user';

    protected $fillable = [
        'id_empresa',
        'id_rol',
        'id_user',
    ];
}   
