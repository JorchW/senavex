<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DirectorioProductoSolicituds extends Model
{
    use HasFactory;

    protected $table = 'directorio.producto_solicituds';
    protected $primaryKey = 'id_producto_solicitud';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_producto_solicitud',
        'id_producto_solicitud_estado',
        'id_producto',
        'id_empresa',
        'id_revisor',
        'id_regional',
        'fecha_registro',
        'fecha_asignacion',
        'fecha_revision',
        'solicitud_observaciones',
        'fecha_limite',
        'id_persona',
        'created_at',
        'updated_at'
    ];
}
