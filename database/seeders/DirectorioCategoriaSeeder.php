<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorioCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorio.directorio_categoria')->insert([
            'id_categoria' => '1',
            'descripcion' => 'Categoria 1',
            'descripcion_larga' => 'categoria de ejemplo 1',
        ]);
        DB::table('directorio.directorio_categoria')->insert([
            'id_categoria' => '2',
            'descripcion' => 'Categoria 2',
            'descripcion_larga' => 'categoria de ejemplo 2',
        ]);
        DB::table('directorio.directorio_categoria')->insert([
            'id_categoria' => '3',
            'descripcion' => 'Categoria 3',
            'descripcion_larga' => 'categoria de ejemplo 3',
        ]);
    }
}
