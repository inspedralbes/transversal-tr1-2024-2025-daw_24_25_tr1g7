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

            // Subcategorías de Almacenamiento
            ['idCategory' => 5, 'name' => 'Discos Duros Externos'],
            ['idCategory' => 5, 'name' => 'SSD Internos'],
            ['idCategory' => 5, 'name' => 'Discos Duros Internos'],
            ['idCategory' => 5, 'name' => 'Unidades Flash USB'],

            // Subcategorías de Accesorios
            ['idCategory' => 6, 'name' => 'Fundas y Carcasas'],
            ['idCategory' => 6, 'name' => 'Cargadores'],
            ['idCategory' => 6, 'name' => 'Soportes'],

            // Subcategorías de Redes
            ['idCategory' => 7, 'name' => 'Routers'],
            ['idCategory' => 7, 'name' => 'Switches'],
            ['idCategory' => 7, 'name' => 'Adaptadores Wi-Fi'],

            // Subcategorías de Smartphones
            ['idCategory' => 8, 'name' => 'Smartphones Android'],
            ['idCategory' => 8, 'name' => 'iPhones'],

            // Subcategorías de Tablets
            ['idCategory' => 9, 'name' => 'Tablets Android'],
            ['idCategory' => 9, 'name' => 'iPads'],

            // Subcategorías de Consolas
            ['idCategory' => 10, 'name' => 'Consolas PlayStation'],
            ['idCategory' => 10, 'name' => 'Consolas Xbox'],
            ['idCategory' => 10, 'name' => 'Consolas Nintendo'],

            // Subcategorías de Impresoras
            ['idCategory' => 11, 'name' => 'Impresoras Láser'],
            ['idCategory' => 11, 'name' => 'Impresoras de Inyección de Tinta'],
            ['idCategory' => 11, 'name' => 'Escáneres'],

            // Subcategorías de Software
            ['idCategory' => 12, 'name' => 'Sistemas Operativos'],
            ['idCategory' => 12, 'name' => 'Software de Ofimática'],
            ['idCategory' => 12, 'name' => 'Antivirus'],
        ];

        DB::table('sub_categorias')->insert($subCategories);
    }
}
