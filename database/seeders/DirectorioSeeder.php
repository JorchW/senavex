<?php

namespace Database\Seeders;

use App\Models\DirectorioExportador;
use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DirectorioExportador::create([
            'id_ddjj'=>'24815',
            'foto1'=>'/storage/images/directorio/directorio11.png',
            'foto2'=>'/storage/images/directorio/directorio12.png',
            'foto3'=>'/storage/images/directorio/directorio13.png',
            'precio'=>'200',
        ]);
        DirectorioExportador::create([
            'id_ddjj'=>'24075',
            'foto1'=>'/storage/images/directorio/directorio21.png',
            'foto2'=>'/storage/images/directorio/directorio22.png',
            'foto3'=>'/storage/images/directorio/directorio23.png',
            'precio'=>'150',
        ]);
        DirectorioExportador::create([
            'id_ddjj'=>'24840',
            'foto1'=>'/storage/images/directorio/directorio31.png',
            'foto2'=>'/storage/images/directorio/directorio32.png',
            'foto3'=>'/storage/images/directorio/directorio33.png',
            'precio'=>'80',
        ]);
        DirectorioExportador::create([
            'id_ddjj'=>'25859',
            'foto1'=>'/storage/images/directorio/directorio41.png',
            'foto2'=>'/storage/images/directorio/directorio42.png',
            'foto3'=>'/storage/images/directorio/directorio43.png',
            'precio'=>'100',
        ]);
        DirectorioExportador::create([
            'id_ddjj'=>'25960',
            'foto1'=>'/storage/images/directorio/directorio51.png',
            'foto2'=>'/storage/images/directorio/directorio52.png',
            'foto3'=>'/storage/images/directorio/directorio53.png',
            'precio'=>'300',
        ]);
    }
}
