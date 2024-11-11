<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Subcategorías relacionadas con las categorías generales
        $subCategories = [
            // Subcategorías de Componentes
            ['idCategory' => 1, 'name' => 'Procesadores'],
            ['idCategory' => 1, 'name' => 'Tarjetas Gráficas'],
            ['idCategory' => 1, 'name' => 'Placas Base'],
            ['idCategory' => 1, 'name' => 'Memoria RAM'],
            ['idCategory' => 1, 'name' => 'Fuentes de Alimentación'],
            ['idCategory' => 1, 'name' => 'Refrigeración'],
            ['idCategory' => 1, 'name' => 'Cajas de PC'],

            // Subcategorías de Portátiles
            ['idCategory' => 2, 'name' => 'Portátiles Gaming'],
            ['idCategory' => 2, 'name' => 'Ultrabooks'],
            ['idCategory' => 2, 'name' => 'Portátiles Profesionales'],

            // Subcategorías de Periféricos
            ['idCategory' => 3, 'name' => 'Ratones'],
            ['idCategory' => 3, 'name' => 'Teclados'],
            ['idCategory' => 3, 'name' => 'Auriculares'],
            ['idCategory' => 3, 'name' => 'Micrófonos'],
            ['idCategory' => 3, 'name' => 'Webcams'],

            // Subcategorías de Monitores
            ['idCategory' => 4, 'name' => 'Monitores Gaming'],
            ['idCategory' => 4, 'name' => 'Monitores Profesionales'],
            ['idCategory' => 4, 'name' => 'Monitores UltraWide'],


            // Subcategorías de Impresoras
            ['idCategory' => 5, 'name' => 'Impresoras Láser'],
            ['idCategory' => 5, 'name' => 'Impresoras de Inyección de Tinta'],
            ['idCategory' => 5, 'name' => 'Escáneres'],

        ];

        DB::table('sub_categorias')->insert($subCategories);
    }
}
