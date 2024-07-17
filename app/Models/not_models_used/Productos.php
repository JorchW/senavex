<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = 'directorio.directorio_productos';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'id_producto',
        'id_ddjj',
        'path_file_photo1',
        'path_file_photo2',
        'path_file_photo3',
        'id_categoria',
        'id_empresa',
        'id_empresa_rubros',
    ];
}