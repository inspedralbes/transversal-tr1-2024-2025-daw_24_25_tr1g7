<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categorías generales de tecnología
        $categories = [
            ['name' => 'Componentes'],
            ['name' => 'Portátiles'],
            ['name' => 'Periféricos'],
            ['name' => 'Monitores'],
            ['name' => 'Almacenamiento'],
            ['name' => 'Accesorios'],
            ['name' => 'Redes'],
            ['name' => 'Smartphones'],
            ['name' => 'Tablets'],
            ['name' => 'Consolas'],
            ['name' => 'Impresoras'],
            ['name' => 'Software'],
        ];

        DB::table('categorias')->insert($categories);
    }
}
