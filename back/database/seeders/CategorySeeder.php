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

        DB::table('categorias')->whereIn('name', [
            'Software', 'Consolas', 'Tablets', 'Smartphones', 
            'Redes', 'Accesorios', 'Almacenamiento'
        ])->delete();
        
        // Categorías generales de tecnología
        $categories = [
            ['name' => 'Componentes'],
            ['name' => 'Portátiles'],
            ['name' => 'Periféricos'],
            ['name' => 'Monitores'],
            ['name' => 'Impresoras'],
        ];  

        DB::table('categorias')->insert($categories);
    }
}
