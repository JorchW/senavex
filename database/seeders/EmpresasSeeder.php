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
            'imagen_empresa' => 'imagen.jpg',
            'direccion' => 'Dirección de mi empresa',
            'ubicacion' => 'Ubicación de mi empresa',
            'facebook' => 'facebook.com/miempresa',
            'whatsapp' => 'whatsapp.com/miempresa',
            'tiktok' => 'tiktok.com/miempresa',
            'id_estado_empresa' => 1,
            'estado' => 'activo',
        ]);
    }
}
