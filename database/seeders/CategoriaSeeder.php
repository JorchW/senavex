<?php

namespace Database\Seeders;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre_categoria' => 'Animales vivos',
            'descripcion_corta' => 'Animales vivos',
            'id_rubro' => '2',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Carne y despojos comestibles',
            'descripcion_corta' => 'Carnes comestibles',
            'id_rubro' => '2',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Pescados y crustáceos, moluscos y demás invertebrados acuáticos',
            'descripcion_corta' => 'Pescados, crustáceos, moluscos',
            'id_rubro' => '2',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Leche y productos lácteos; huevos de ave; miel natural; productos comestibles de origen animal, no expresados ni comprendidos en otra parte',
            'descripcion_corta' => 'Lacteos, productos comestible origen animal',
            'id_rubro' => '2',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Los demás productos de origen animal no expresados ni comprendidos en otra parte',
            'descripcion_corta' => 'Otros productos de origen animal',
            'id_rubro' => '2',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Plantas vivas y productos de la floricultura',
            'descripcion_corta' => 'Plantas y floricultura',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Hortalizas, plantas, raíces y tubérculos alimenticios',
            'descripcion_corta' => 'Hortalizas y tuberculos alimenticios',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Frutas y frutos comestibles; cortezas de agrios (cítricos), melones o sandías',
            'descripcion_corta' => 'Frutas y frutos comestibles',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Café, té, yerba mate y especias',
            'descripcion_corta' => 'Bebidas consumibles calientes',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Cereales',
            'descripcion_corta' => 'Cereales',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos de la molinería; malta; almidón y fécula; inulina; gluten de trigo',
            'descripcion_corta' => 'Productos de la molineria',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Semillas y frutos oleaginosos; semillas y frutos diversos; plantas industriales o medicinales; paja y forraje',
            'descripcion_corta' => 'Semillas y frutos en variedad',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Gomas, resinas y demás jugos y extractos vegetales',
            'descripcion_corta' => 'Gomas y extractos vegetales',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Materias trenzables y demás productos de origen vegetal, no expresados ni comprendidos en otra parte',
            'descripcion_corta' => 'Materias trenzables y origen vegetal',
            'id_rubro' => '4',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Grasas y aceites, animales, vegetales o de origen microbiano, y productos de su desdoblamiento; grasas alimenticias elaboradas; ceras de origen animal o vegetal',
            'descripcion_corta' => 'Aceites y grasas',
            'id_rubro' => '5',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Preparaciones de carne, pescado, crustáceos, moluscos o demás invertebrados acuáticos, o de insectos',
            'descripcion_corta' => 'Preparacion de carne y crustaceos',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Azúcares y artículos de confitería',
            'descripcion_corta' => 'Azúcares y artículos de confitería',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Cacao y sus preparaciones',
            'descripcion_corta' => 'Cacao y sus preparaciones',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Preparaciones a base de cereales, harina, almidón, fécula o leche; productos de pastelería',
            'descripcion_corta' => 'Base de cereales, productos de pasteleria',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Preparaciones de hortalizas, frutas u otros frutos o demás partes de plantas',
            'descripcion_corta' => 'Preparacion de hortalizas',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Preparaciones alimenticias diversas',
            'descripcion_corta' => 'Preparaciones alimenticias diversas',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Bebidas, líquidos alcohólicos y vinagre',
            'descripcion_corta' => 'Bebidas, líquidos alcohólicos y vinagre',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Residuos y desperdicios de las industrias alimentarias; alimentos preparados para animales',
            'descripcion_corta' => 'Alimentos para animales, residuos',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Tabaco y sucedáneos del tabaco elaborados; productos, incluso con nicotina, destinados para la inhalación sin combustión; otros productos que contengan nicotina destinados para la absorción de nicotina en el cuerpo humano.   ',
            'descripcion_corta' => 'Productos con tabaco elaborados',
            'id_rubro' => '7',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Sal; azufre; tierras y piedras; yesos, cales y cementos',
            'descripcion_corta' => 'Cales y cementos',
            'id_rubro' => '8',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Minerales metalíferos, escorias y cenizas',
            'descripcion_corta' => 'Minerales metalíferos, escorias y cenizas',
            'id_rubro' => '8',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Combustibles minerales, aceites minerales y productos de su destilación; materias bituminosas; ceras minerales',
            'descripcion_corta' => 'Combustibles minerales, aceites minerales',
            'id_rubro' => '8',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos químicos inorgánicos; compuestos inorgánicos u orgánicos de metal precioso, de elementos radiactivos, de metales de las tierras raras o de isótopos',
            'descripcion_corta' => 'Productos químicos inorgánicos',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos químicos orgánicos',
            'descripcion_corta' => 'Productos químicos orgánicos',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos farmacéuticos',
            'descripcion_corta' => 'Productos farmacéuticos',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Abonos',
            'descripcion_corta' => 'Abonos',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Extractos curtientes o tintóreos; taninos y sus derivados; pigmentos y demás materias colorantes; pinturas y barnices; mástiques; tintas',
            'descripcion_corta' => 'Extractos curtientes o tintóreos',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Aceites esenciales y resinoides; preparaciones de perfumería, de tocador o de cosmética',
            'descripcion_corta' => 'Aceites esenciales y resinoides',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Jabón, agentes de superficie orgánicos, preparaciones para lavar, preparaciones lubricantes, ceras artificiales, ceras preparadas, productos de limpieza, velas y artículos similares, pastas para modelar, «ceras para odontología» y preparaciones para odontología a base de yeso fraguable',
            'descripcion_corta' => 'Javones',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Materias albuminoideas; productos a base de almidón o de fécula modificados; colas; enzimas',
            'descripcion_corta' => 'Materias albuminoideas',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Pólvora y explosivos; artículos de pirotecnia; fósforos (cerillas); aleaciones pirofóricas; materias inflamables',
            'descripcion_corta' => 'Pólvora y explosivos',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos fotográficos o cinematográficos',
            'descripcion_corta' => 'Productos fotográficos o cinematográficos',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos diversos de las industrias químicas',
            'descripcion_corta' => 'Productos diversos de las industrias químicas',
            'id_rubro' => '9',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Plástico y sus manufacturas',
            'descripcion_corta' => 'Plástico y sus manufacturas',
            'id_rubro' => '10',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Caucho y sus manufacturas',
            'descripcion_corta' => 'Caucho y sus manufacturas',
            'id_rubro' => '10',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Pieles (excepto la peletería) y cueros',
            'descripcion_corta' => 'Pieles',
            'id_rubro' => '11',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Manufacturas de cuero; artículos de talabartería o guarnicionería; artículos de viaje, bolsos de mano (carteras) y continentes similares; manufacturas de tripa',
            'descripcion_corta' => 'Manufacturas de cuero',
            'id_rubro' => '11',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Peletería y confecciones de peletería; peletería facticia o artificial',
            'descripcion_corta' => 'Peletería y confecciones de peletería',
            'id_rubro' => '11',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Madera, carbón vegetal y manufacturas de madera',
            'descripcion_corta' => 'Madera, carbón vegetal y manufacturas de madera',
            'id_rubro' => '12',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Corcho y sus manufacturas',
            'descripcion_corta' => 'Corcho y sus manufacturas',
            'id_rubro' => '12',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Manufacturas de espartería o cestería',
            'descripcion_corta' => 'Manufacturas de espartería o cestería',
            'id_rubro' => '12',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Pasta de madera o de las demás materias fibrosas celulósicas; papel o cartón para reciclar (desperdicios y desechos)',
            'descripcion_corta' => 'Pasta de madera',
            'id_rubro' => '15',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Papel y cartón; manufacturas de pasta de celulosa, de papel o cartón',
            'descripcion_corta' => 'Papel y cartón',
            'id_rubro' => '15',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos editoriales, de la prensa y de las demás industrias gráficas; textos manuscritos o mecanografiados y planos',
            'descripcion_corta' => 'Productos editoriales',
            'id_rubro' => '15',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Seda',
            'descripcion_corta' => 'Seda',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Lana y pelo fino u ordinario; hilados y tejidos de crin',
            'descripcion_corta' => 'Lana y pelo fino u ordinario',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Algodón',
            'descripcion_corta' => 'Algodón',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Las demás fibras textiles vegetales; hilados de papel y tejidos de hilados de papel',
            'descripcion_corta' => 'Las demás fibras textiles vegetales',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Filamentos sintéticos o artificiales; tiras y formas similares de materia textil sintética o artificial',
            'descripcion_corta' => 'Filamentos sintéticos o artificiales',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Fibras sintéticas o artificiales discontinuas',
            'descripcion_corta' => 'Fibras sintéticas o artificiales discontinuas',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Guata, fieltro y tela sin tejer; hilados especiales; cordeles, cuerdas y cordajes; artículos de cordelería',
            'descripcion_corta' => 'Guata, fieltro y tela sin tejer',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Alfombras y demás revestimientos para el suelo, de materia textil',
            'descripcion_corta' => 'Alfombras',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Tejidos especiales; superficies textiles con mechón insertado; encajes; tapicería; pasamanería; bordados',
            'descripcion_corta' => 'Tejidos especiales',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Telas impregnadas, recubiertas, revestidas o estratificadas; artículos técnicos de materia textil',
            'descripcion_corta' => 'Telas impregnadas',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Tejidos de punto',
            'descripcion_corta' => 'Tejidos de punto',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Prendas y complementos (accesorios), de vestir, de punto',
            'descripcion_corta' => 'Prendas y complementos, de punto',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Prendas y complementos (accesorios), de vestir, excepto los de punto',
            'descripcion_corta' => 'Prendas y complementos, excepto los de punto',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Los demás artículos textiles confeccionados; juegos; prendería y trapos',
            'descripcion_corta' => 'Artículos textiles confeccionados',
            'id_rubro' => '16',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Calzado, polainas y artículos análogos; partes de estos artículos',
            'descripcion_corta' => 'Calzado, polainas y artículos análogos',
            'id_rubro' => '18',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Sombreros, demás tocados y sus partes',
            'descripcion_corta' => 'Sombreros',
            'id_rubro' => '18',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Paraguas, sombrillas, quitasoles, bastones, bastones asiento, látigos, fustas, y sus partes',
            'descripcion_corta' => 'Paraguas entre derivados',
            'id_rubro' => '18',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Plumas y plumón preparados y artículos de plumas o plumón; flores artificiales; manufacturas de cabello',
            'descripcion_corta' => 'Plumas y plumón',
            'id_rubro' => '18',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Manufacturas de piedra, yeso fraguable, cemento, amianto (asbesto), mica o materias análogas',
            'descripcion_corta' => 'Manufacturas de piedra',
            'id_rubro' => '19',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Productos cerámicos',
            'descripcion_corta' => 'Productos cerámicos',
            'id_rubro' => '19',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Vidrio y sus manufacturas',
            'descripcion_corta' => 'Vidrio y sus manufacturas',
            'id_rubro' => '19',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Perlas finas (naturales) o cultivadas, piedras preciosas o semipreciosas, metales preciosos, chapados de metal precioso (plaqué) y manufacturas de estas materias; bisutería; monedas',
            'descripcion_corta' => 'Perlas finas',
            'id_rubro' => '20',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Fundición, hierro y acero',
            'descripcion_corta' => 'Fundición, hierro y acero',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Manufacturas de fundición, hierro o acero',
            'descripcion_corta' => 'Manufacturas de fundición, hierro o acero',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Cobre y sus manufacturas',
            'descripcion_corta' => 'Cobre y sus manufacturas',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Níquel y sus manufacturas',
            'descripcion_corta' => 'Níquel y sus manufacturas',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Aluminio y sus manufacturas',
            'descripcion_corta' => 'Aluminio y sus manufacturas',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => '(Reservado para una futura utilización en el Sistema Armonizado)',
            'descripcion_corta' => '',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Plomo y sus manufacturas',
            'descripcion_corta' => 'Plomo y sus manufacturas',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Cinc y sus manufacturas',
            'descripcion_corta' => 'Cinc y sus manufacturas',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Estaño y sus manufacturas',
            'descripcion_corta' => 'Estaño y sus manufacturas',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Los demás metales comunes; cermets; manufacturas de estas materias',
            'descripcion_corta' => 'Metales comunes',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Herramientas y útiles, artículos de cuchillería y cubiertos de mesa, de metal común; partes de estos artículos, de metal común',
            'descripcion_corta' => 'Herramientas y útiles',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Manufacturas diversas de metal común',
            'descripcion_corta' => 'Manufacturas diversas de metal común',
            'id_rubro' => '21',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Reactores nucleares, calderas, máquinas, aparatos y artefactos mecánicos; partes de  estas máquinas o aparatos',
            'descripcion_corta' => 'Reactores nucleares',
            'id_rubro' => '22',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Máquinas, aparatos y material eléctrico, y sus partes; aparatos de grabación o reproducción de sonido, aparatos de grabación o reproducción de imagen y sonido en televisión, y las partes y accesorios de estos aparatos',
            'descripcion_corta' => 'Máquinas, aparatos y material eléctrico',
            'id_rubro' => '22',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Vehículos y material para vías férreas o similares, y sus partes; aparatos mecánicos (incluso electromecánicos) de señalización para vías de comunicación',
            'descripcion_corta' => 'Vehículos',
            'id_rubro' => '23',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Vehículos automóviles, tractores, velocípedos y demás vehículos terrestres; sus partes y accesorios',
            'descripcion_corta' => 'Vehículos automóviles',
            'id_rubro' => '23',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Aeronaves, vehículos espaciales, y sus partes',
            'descripcion_corta' => 'Aeronaves',
            'id_rubro' => '23',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Barcos y demás artefactos flotantes',
            'descripcion_corta' => 'Barcos y demás artefactos flotantes',
            'id_rubro' => '23',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Instrumentos y aparatos de óptica, fotografía o cinematografía, de medida, control o precisión; instrumentos y aparatos medicoquirúrgicos; partes y accesorios de estos instrumentos o aparatos',
            'descripcion_corta' => 'Instrumentos y aparatos de óptica',
            'id_rubro' => '24',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Aparatos de relojería y sus partes',
            'descripcion_corta' => 'Aparatos de relojería y sus partes',
            'id_rubro' => '24',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Instrumentos musicales; sus partes y accesorios',
            'descripcion_corta' => 'Instrumentos musicales',
            'id_rubro' => '24',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Armas, municiones, y sus partes y accesorios',
            'descripcion_corta' => 'Armas',
            'id_rubro' => '25',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Muebles; mobiliario medicoquirúrgico; artículos de cama y similares; luminarias y aparatos de alumbrado no expresados ni comprendidos en otra parte; anuncios, letreros y placas indicadoras luminosos y artículos similares; construcciones prefabricadas',
            'descripcion_corta' => 'Muebles',
            'id_rubro' => '26',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Juguetes, juegos y artículos para recreo o deporte; sus partes y accesorios',
            'descripcion_corta' => 'Juguetes, juegos y artículos para recreo',
            'id_rubro' => '26',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Manufacturas diversas',
            'descripcion_corta' => 'Manufacturas diversas',
            'id_rubro' => '26',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Objetos de arte o colección y antigüedades',
            'descripcion_corta' => 'Objetos de arte o colección y antigüedades',
            'id_rubro' => '27',
        ]);
        Categoria::create([
            'nombre_categoria' => 'Mercancías con Tratamiento especial',
            'descripcion_corta' => 'Mercancías con Tratamiento especial',
            'id_rubro' => '27',
        ]);
    }
}
