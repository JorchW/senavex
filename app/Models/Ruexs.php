<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruexs extends Model
{
    use HasFactory;

    protected $table='ruexs';

    protected $primaryKey='id_ruex';

    protected $fillable=[
        'id_ruex',
        'ruex'
    ];
}
