<?php

namespace Database\Seeders;
use App\Models\UnidadMedidas;
use Illuminate\Database\Seeder;

class UnidadMedidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadMedidas::create([
            'nombre_unidad_medida' => 'PESO',
            'abrv_unidad_medida' => '',
            'descripcion_unidad_medida' => '',
        ]);
        UnidadMedidas::create([
            'nombre_unidad_medida' => 'LONGITUD',
            'abrv_unidad_medida' => '',
            'descripcion_unidad_medida' => '',
        ]);
        UnidadMedidas::create([
            'nombre_unidad_medida' => 'ÁREA',
            'abrv_unidad_medida' => '',
            'descripcion_unidad_medida' => '',
        ]);
        UnidadMedidas::create([
            'nombre_unidad_medida' => 'VOLUMEN',
            'abrv_unidad_medida' => '',
            'descripcion_unidad_medida' => '',
        ]);
        UnidadMedidas::create([
            'nombre_unidad_medida' => 'ENERGÍA ELÉCTRICA',
            'abrv_unidad_medida' => '',
            'descripcion_unidad_medida' => '',
        ]);
        UnidadMedidas::create([
            'nombre_unidad_medida' => 'CANTIDAD',
            'abrv_unidad_medida' => '',
            'descripcion_unidad_medida' => '',
        ]);
    }
}
