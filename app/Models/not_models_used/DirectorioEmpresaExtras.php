<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorioEmpresaExtras extends Model
{
    use HasFactory;

    protected $table='directorio.directorio_empresa_extras';

    protected $primaryKey='id_empresa_extras';

    protected $fillable=[
        'path_file_foto1',
        'path_file_foto2',
    ];
}
