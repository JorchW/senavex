<?php

namespace Database\Seeders;

use App\Models\Rubro;
use Illuminate\Database\Seeder;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*public function run()
    {
        Rubro::create([
            'id_rubro' => '2',
            'nombre_rubro' => 'I.- ANIMALES VIVOS Y PRODUCTOS DEL REINO ANIMAL',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/1.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '4',
            'nombre_rubro' => 'II.- PRODUCTOS DEL REINO VEGETAL',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/2.png',
        ]);
        Rubro::create([
            'id_rubro' => '5',
            'nombre_rubro' => 'III.- GRASAS Y ACEITES, ANIMALES, VEGETALES O DE ORIGEN MICROBIANO, Y PRODUCTOS DE SU DESDOBLAMIENTO; GRASAS ALIMENTICIAS ELABORADAS; CERAS DE ORIGEN ANIMALO VEGETAL',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/3.png',
        ]);
        Rubro::create([
            'id_rubro' => '7',
            'nombre_rubro' => 'IV.- PRODUCTOS DE LAS INDUSTRIAS ALIMENTARIAS; BEBIDAS LIQUIDOS ALCOHOLICOS Y VINAGRE; TABACO Y SUCEDANEOS DEL TABACO ELABORADOS; PRODUCTOS, INCLUSO CON NICOTINA, DESTINADOS PARA LA INHALACION SIN COMBUSTION; OTROS PRODUCTOS QUE CONTEGAN NICOTINA DESTINADOS PARA ABSORCION DE NICOTINA EN EL CUERPO HUMANO',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/4.png',
        ]);
        Rubro::create([
            'id_rubro' => '8',
            'nombre_rubro' => 'V.- PRODUCTOS MINERALES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/5.png',
        ]);
        Rubro::create([
            'id_rubro' => '9',
            'nombre_rubro' => 'VI.- PRODUCTOS DE LAS INDUSTRIAS QUIMICAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/6.png',
        ]);
        Rubro::create([
            'id_rubro' => '10',
            'nombre_rubro' => 'VII.- PLASTICO Y SUS MANUFACTURAS; CAUCHO Y SUS MANUFACTURAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/7.png',
        ]);
        Rubro::create([
            'id_rubro' => '11',
            'nombre_rubro' => 'VIII.- PILES, CUEROS, PELETERIA, Y MANUFACTURAS DE ESTAS MATERIAS; ARTICULOS DE TALABARTERIA O GUARNICIONERIA; ARTICULOS DE VIAJE BOLSOS DE MANO (CARTERAS) Y CONTINENTES SIMILARES; MANUFACTURAS DE TRIPA',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/8.png',
        ]);
        Rubro::create([
            'id_rubro' => '12',
            'nombre_rubro' => 'IX.- MADERA, CARBON Y VEGETAL Y MANUFACTURAS DE MADERA; CORCHO Y SUS MANUFACTURAS; MANUFACTURAS DE ESPARTERIA O CESTERIA',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/9.png',
        ]);
        Rubro::create([
            'id_rubro' => '15',
            'nombre_rubro' => 'X.- PASTA DE MADERA O DE LAS DEMAS MATERIAS FIBROSAS CELULOSICAS; PAPEL O CARTON PARA RECICLAR (DESPERDICIOS Y DESECHOS); PAPEL O CARTON Y SUS APLICACIONES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/10.png',
        ]);
        Rubro::create([
            'id_rubro' => '16',
            'nombre_rubro' => 'XI.- MATERIAS TEXTILES Y SUS MANUFACTURAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/11.png',
        ]);
        Rubro::create([
            'id_rubro' => '18',
            'nombre_rubro' => 'XII.- CALZADOS, SOMBREROS Y DEMAS TOCADOS, PARAGUAS, QUITASOLES, BASTONES, LATIGOS, FUSTAS Y SUS PARTES; PLUMAS PREPARADAS Y ARTICULOS DE PLUMAS; FLORES ARTIFICIALES; MANUFACTURAS DE CABELLO',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/12.png',
        ]);
        Rubro::create([
            'id_rubro' => '19',
            'nombre_rubro' => 'XIII.- MANUFACTURAS DE PIEDRA, YESO FRAGUABLE, CEMENTO, AMIANTO (ASBESTO), MICA O MATERIAS ANALOGAS; PRODUCTOS CERAMICOS; VIDRIO Y SUS MANUFACTURAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/13.png',
        ]);
        Rubro::create([
            'id_rubro' => '20',
            'nombre_rubro' => 'XIV.- PERLAS FINAS (NATURALES) O CULTIVADAS, PIEDRAS PRECIOSAS O SEMIPRECIOSAS, METALES PRECIOSOS, CHAPADOS DE METAL PRECIOSO (PLAQUE) Y MANUFACTURAS DE ESTAS MATERIAS; BISUTERIAS; MONEDAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/14.png',
        ]);
        Rubro::create([
            'id_rubro' => '21',
            'nombre_rubro' => 'XV.- METALES COMUNES Y MANUFACTURAS DE ESTOS METALES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/15.png',
        ]);
        Rubro::create([
            'id_rubro' => '22',
            'nombre_rubro' => 'XVI.- MAQUINAS Y APARATOS, MATERIAL ELECTRICO Y SUS PARTES; APARATOS DE GRABACION O REPRODUCCION DE SONIDO, APARATOS DE GRABACION O REPRODUCCION DE IMAGEN Y SONIDO EN TELEVISION Y LAS PARTES Y ACCESORIOS DE ESTOS APARATOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/16.png',
        ]);
        Rubro::create([
            'id_rubro' => '23',
            'nombre_rubro' => 'XVII.- MATERIAL DE TRANSPORTE',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/17.png',
        ]);
        Rubro::create([
            'id_rubro' => '24',
            'nombre_rubro' => 'XVIII.- INSTRUMENTOS Y APARATOS DE OPTICA, FOTOGRAFIA O CINEMATOGRAFIA, DE MEDIDA, CONTROL O PRECISION; INSTRUMENTOS Y APARATOS MEDICOQUIRURGICOS; APARATOS DE RELOJERIA; INSTRUMENTOS MUSICALES; PARTES Y ACCESORIOS DE ESTOS INSTRUMENTOS O APARATOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/18.png',
        ]);
        Rubro::create([
            'id_rubro' => '25',
            'nombre_rubro' => 'XIX.- ARMAS, MUNICIONES, Y SUS PARTES Y ACCESORIOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/19.png',
        ]);
        Rubro::create([
            'id_rubro' => '26',
            'nombre_rubro' => 'XX.- MERCANCIAS Y PRODUCTOS DIVERSOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/20.png',
        ]);
        Rubro::create([
            'id_rubro' => '27',
            'nombre_rubro' => 'XXI.- OBJETOS DE ARTE O COLECCION Y ANTIGUEDADES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => 'http://directorio.senavex.gob.bo/storage/images/rubros/21.png',
        ]);
    }*/

    public function run()
    {
        Rubro::create([
            'id_rubro' => '2',
            'nombre_rubro' => 'I.- ANIMALES VIVOS Y PRODUCTOS DEL REINO ANIMAL',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/1.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '4',
            'nombre_rubro' => 'II.- PRODUCTOS DEL REINO VEGETAL',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/2.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '5',
            'nombre_rubro' => 'III.- GRASAS Y ACEITES, ANIMALES, VEGETALES O DE ORIGEN MICROBIANO, Y PRODUCTOS DE SU DESDOBLAMIENTO; GRASAS ALIMENTICIAS ELABORADAS; CERAS DE ORIGEN ANIMALO VEGETAL',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/3.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '7',
            'nombre_rubro' => 'IV.- PRODUCTOS DE LAS INDUSTRIAS ALIMENTARIAS; BEBIDAS LIQUIDOS ALCOHOLICOS Y VINAGRE; TABACO Y SUCEDANEOS DEL TABACO ELABORADOS; PRODUCTOS, INCLUSO CON NICOTINA, DESTINADOS PARA LA INHALACION SIN COMBUSTION; OTROS PRODUCTOS QUE CONTEGAN NICOTINA DESTINADOS PARA ABSORCION DE NICOTINA EN EL CUERPO HUMANO',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/4.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '8',
            'nombre_rubro' => 'V.- PRODUCTOS MINERALES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/5.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '9',
            'nombre_rubro' => 'VI.- PRODUCTOS DE LAS INDUSTRIAS QUIMICAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/6.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '10',
            'nombre_rubro' => 'VII.- PLASTICO Y SUS MANUFACTURAS; CAUCHO Y SUS MANUFACTURAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/7.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '11',
            'nombre_rubro' => 'VIII.- PILES, CUEROS, PELETERIA, Y MANUFACTURAS DE ESTAS MATERIAS; ARTICULOS DE TALABARTERIA O GUARNICIONERIA; ARTICULOS DE VIAJE BOLSOS DE MANO (CARTERAS) Y CONTINENTES SIMILARES; MANUFACTURAS DE TRIPA',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/8.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '12',
            'nombre_rubro' => 'IX.- MADERA, CARBON Y VEGETAL Y MANUFACTURAS DE MADERA; CORCHO Y SUS MANUFACTURAS; MANUFACTURAS DE ESPARTERIA O CESTERIA',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/9.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '15',
            'nombre_rubro' => 'X.- PASTA DE MADERA O DE LAS DEMAS MATERIAS FIBROSAS CELULOSICAS; PAPEL O CARTON PARA RECICLAR (DESPERDICIOS Y DESECHOS); PAPEL O CARTON Y SUS APLICACIONES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/10.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '16',
            'nombre_rubro' => 'XI.- MATERIAS TEXTILES Y SUS MANUFACTURAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/11.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '18',
            'nombre_rubro' => 'XII.- CALZADOS, SOMBREROS Y DEMAS TOCADOS, PARAGUAS, QUITASOLES, BASTONES, LATIGOS, FUSTAS Y SUS PARTES; PLUMAS PREPARADAS Y ARTICULOS DE PLUMAS; FLORES ARTIFICIALES; MANUFACTURAS DE CABELLO',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/12.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '19',
            'nombre_rubro' => 'XIII.- MANUFACTURAS DE PIEDRA, YESO FRAGUABLE, CEMENTO, AMIANTO (ASBESTO), MICA O MATERIAS ANALOGAS; PRODUCTOS CERAMICOS; VIDRIO Y SUS MANUFACTURAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/13.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '20',
            'nombre_rubro' => 'XIV.- PERLAS FINAS (NATURALES) O CULTIVADAS, PIEDRAS PRECIOSAS O SEMIPRECIOSAS, METALES PRECIOSOS, CHAPADOS DE METAL PRECIOSO (PLAQUE) Y MANUFACTURAS DE ESTAS MATERIAS; BISUTERIAS; MONEDAS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/14.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '21',
            'nombre_rubro' => 'XV.- METALES COMUNES Y MANUFACTURAS DE ESTOS METALES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/15.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '22',
            'nombre_rubro' => 'XVI.- MAQUINAS Y APARATOS, MATERIAL ELECTRICO Y SUS PARTES; APARATOS DE GRABACION O REPRODUCCION DE SONIDO, APARATOS DE GRABACION O REPRODUCCION DE IMAGEN Y SONIDO EN TELEVISION Y LAS PARTES Y ACCESORIOS DE ESTOS APARATOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/16.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '23',
            'nombre_rubro' => 'XVII.- MATERIAL DE TRANSPORTE',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/17.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '24',
            'nombre_rubro' => 'XVIII.- INSTRUMENTOS Y APARATOS DE OPTICA, FOTOGRAFIA O CINEMATOGRAFIA, DE MEDIDA, CONTROL O PRECISION; INSTRUMENTOS Y APARATOS MEDICOQUIRURGICOS; APARATOS DE RELOJERIA; INSTRUMENTOS MUSICALES; PARTES Y ACCESORIOS DE ESTOS INSTRUMENTOS O APARATOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/18.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '25',
            'nombre_rubro' => 'XIX.- ARMAS, MUNICIONES, Y SUS PARTES Y ACCESORIOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/19.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '26',
            'nombre_rubro' => 'XX.- MERCANCIAS Y PRODUCTOS DIVERSOS',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/20.png',
            'estado' => 'activo'
        ]);
        Rubro::create([
            'id_rubro' => '27',
            'nombre_rubro' => 'XXI.- OBJETOS DE ARTE O COLECCION Y ANTIGUEDADES',
            'abreviacion_rubro' => '',
            'imagen_rubro' => '/storage/images/rubros/21.png',
            'estado' => 'activo'
        ]);
    }

}