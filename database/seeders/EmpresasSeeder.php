<?php

namespace Database\Seeders;

use App\Models\Empresas;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresas::create([
            'id_empresa' => 1,
            'razon_social_empresa' => 'Mi Empresa',
            'descripcion_empresa' => 'Descripción de mi empresa',
            'nit' => 123456789,
            'matricula' => 987654321,
            'telefono' => 123456789,
            'celular_1' => 987654321,
            'nombre_1' => 'Nombre 1',
            'celular_2' => 555555555,
            'nombre_2' => 'Nombre 2',
            'email' => 'empresa@example.com',
            'pag_web' => 'http://www.miempresa.com',
            'ruex' => 'RU000001',
            'estado_ruex' => true,
            'imagen_empresa' => '/storage/images/empresas/empresa1.png',
            'direccion' => 'Dirección de mi empresa',
            'ubicacion' => 'Ubicación de mi empresa',
            'facebook' => 'facebook.com/miempresa',
            'whatsapp' => 'whatsapp.com/miempresa',
            'tiktok' => 'tiktok.com/miempresa',
            'id_estado_empresa' => 1,
            'estado' => 'activo',
        ]);

        Empresas::create([
            'id_empresa' => 2,
            'razon_social_empresa' => 'Mi Empresa 2',
            'descripcion_empresa' => 'Descripción de mi empresa 2',
            'nit' => 223123123,
            'matricula' => 827362123,
            'telefono' => 2223212,
            'celular_1' => 78271112,
            'nombre_1' => 'Nombre 1',
            'celular_2' => 555555555,
            'nombre_2' => 'Nombre 2',
            'email' => 'empresa2@example.com',
            'pag_web' => 'http://www.miempresa2.com',
            'ruex' => 'RU000002',
            'estado_ruex' => true,
            'imagen_empresa' => '/storage/images/empresas/empresa2.png',
            'direccion' => 'Dirección de mi empresa 2',
            'ubicacion' => 'Ubicación de mi empresa 2',
            'facebook' => 'facebook.com/miempresa2',
            'whatsapp' => 'whatsapp.com/miempresa2',
            'tiktok' => 'tiktok.com/miempresa2',
            'id_estado_empresa' => 1,
            'estado' => 'activo',
        ]);
    }
}
