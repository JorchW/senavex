<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorioExportador extends Model
{
    use HasFactory;

    protected $table='directorio_exportador';

    protected $primaryKey='id_ddjj';

    protected $fillable=[
        'id_ddjj',
        'foto1',
        'foto2',
        'foto3',
        'precio',
    ];
}
