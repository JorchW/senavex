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
            'imagen_producto' => '/storage/images/productos/producto1.png',
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
            'imagen_producto' => '/storage/images/productos/producto1.png',
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

        Productos::create([
            'id_producto' => '3',
            'cantidad_disponible' => '70',
            'nombre_producto' => 'Producto 3',
            'imagen_producto' => '/storage/images/productos/producto1.png',
            'descripcion_producto' => 'Descripción del producto 3',
            'precio_producto' => '30',
            'precio_producto_max' => '90',
            'codigo_nandina' => '283212',
            'estrella' => '3',
            'numero_producto' => 'P003',
            'estado_producto' => 'popular',
            'estado' => 'activo',
            'id_rubro' => '5',
            'id_categoria' => '1',
            'id_unidad_medida' => '3',
            'id_moneda' => '1',
            'id_empresa' => '2'
        ]);

        Productos::create([
            'id_producto' => '4',
            'cantidad_disponible' => '1400',
            'nombre_producto' => 'Producto 4',
            'imagen_producto' => '/storage/images/productos/producto1.png',
            'descripcion_producto' => 'Descripción del producto 4',
            'precio_producto' => '250',
            'precio_producto_max' => '620',
            'codigo_nandina' => '882732',
            'estrella' => '4',
            'numero_producto' => 'P004',
            'estado_producto' => 'popular',
            'estado' => 'activo',
            'id_rubro' => '5',
            'id_categoria' => '3',
            'id_unidad_medida' => '2',
            'id_moneda' => '1',
            'id_empresa' => '2'
        ]);
    }
}
