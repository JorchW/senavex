<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;

    protected $table = 'empresa_rubro';
    protected $primaryKey = 'id_rubro';
    
    protected $fillable = [
        'descripcion_rubro',
    ];
}
