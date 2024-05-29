<?php

namespace Database\Seeders;

use App\Models\Productos;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productos::create([
            'id_producto' => '1',
            'cantidad_disponible' => '50',
            'nombre_producto' => 'Producto 1',
            'imagen_producto' => 'imagen1.jpg',
            'descripcion_producto' => 'Descripción del producto 1',
            'precio_producto' => '40',
            'precio_producto_max' => '100',
            'codigo_nandina' => '123456',
            'estrella' => '5',
            'numero_producto' => 'P001',
            'estado_producto' => 'popular',
            'estado' => 'activo',
            'id_rubro' => '4',
            'id_categoria' => '2',
            'id_unidad_medida' => '1',
            'id_moneda' => '1',
            'id_empresa' => '1'
        ]);

        Productos::create([
            'id_producto' => '2',
            'cantidad_disponible' => '140',
            'nombre_producto' => 'Producto 2',
            'imagen_producto' => 'imagen2.jpg',
            'descripcion_producto' => 'Descripción del producto 2',
            'precio_producto' => '200',
            'precio_producto_max' => '1000',
            'codigo_nandina' => '123433',
            'estrella' => '3',
            'numero_producto' => 'P002',
            'estado_producto' => 'popular',
            'estado' => 'activo',
            'id_rubro' => '4',
            'id_categoria' => '2',
            'id_unidad_medida' => '1',
            'id_moneda' => '1',
            'id_empresa' => '1'
        ]);
    }
}
