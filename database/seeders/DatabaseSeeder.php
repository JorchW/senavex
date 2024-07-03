<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call(DirectorioCategoriaSeeder::class);
        //$this->call(GrupoEstadoEmpresaSeeder::class);
        //$this->call(EmpresasSeeder::class);
        //$this->call(GrupoEmpresaUserSeeder::class);
        //$this->call(RubroSeeder::class);
        //$this->call(CategoriaSeeder::class);
        //$this->call(MonedaSeeder::class);
        //$this->call(UnidadMedidasSeeder::class);
        //$this->call(ProductosSeeder::class);
        //$this->call(DirectorioSeeder::class);
    }
}
