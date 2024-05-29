<?php

namespace Database\Seeders;

use App\Models\EstadoEmpresas;
use Illuminate\Database\Seeder;

class GrupoEstadoEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoEmpresas::create([
            "id_estado_empresa"=> 1,
            "estado_empresa"=> "Activo"
        ]);
    }
}
