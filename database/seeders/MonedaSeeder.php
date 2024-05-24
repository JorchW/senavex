<?php

namespace Database\Seeders;
use App\Models\Monedas;
use Illuminate\Database\Seeder;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Monedas::create([
            'nombre_moneda' => 'BOLIVIANOS',
            'abrv_moneda' => 'BOB',
            'descripcion_moneda' => '',
        ]);
        Monedas::create([
            'nombre_moneda' => 'DÓLARES',
            'abrv_moneda' => 'USD',
            'descripcion_moneda' => '',
        ]);
    }
}
