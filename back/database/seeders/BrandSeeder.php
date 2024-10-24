<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'url' => 'https://www.apple.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/800px-Apple_logo_black.svg.png', // Cambia a la ruta correcta de la imagen
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'url' => 'https://www.samsung.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/1000px-Samsung_Logo.svg.png',
            ],
            [
                'name' => 'NVIDIA',
                'slug' => 'nvidia',
                'url' => 'https://www.nvidia.com',
                'image' => 'https://www.nvidia.com/content/nvidiaGDC/es/es_ES/about-nvidia/legal-info/logo-brand-usage/_jcr_content/root/responsivegrid/nv_container_392921705/nv_container_412055486/nv_image.coreimg.100.1070.png/1722330524427/nvidia-logo-horz.png',
            ],
            [
                'name' => 'AMD',
                'slug' => 'amd',
                'url' => 'https://www.amd.com',
                'image' => 'https://logos-world.net/wp-content/uploads/2020/03/AMD-Logo.png',
            ],
            [
                'name' => 'Dell',
                'slug' => 'dell',
                'url' => 'https://www.dell.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Dell_Logo.svg/1024px-Dell_Logo.svg.png',
            ],
            [
                'name' => 'HP',
                'slug' => 'hp',
                'url' => 'https://www.hp.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/HP_logo_2012.svg/2048px-HP_logo_2012.svg.png',
            ],
            [
                'name' => 'Logitech',
                'slug' => 'logitech',
                'url' => 'https://www.logitech.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/17/Logitech_logo.svg',
            ],
            [
                'name' => 'Kingston',
                'slug' => 'kingston',
                'url' => 'https://www.kingston.com',
                'image' => 'https://cdn.worldvectorlogo.com/logos/kingston-technology.svg',
            ],
            [
                'name' => 'Corsair',
                'slug' => 'corsair',
                'url' => 'https://www.corsair.com',
                'image' => 'https://cwsmgmt.corsair.com/press/CORSAIRLogo2020_stack_K.png',
            ],
            [
                'name' => 'Seagate',
                'slug' => 'seagate',
                'url' => 'https://www.seagate.com',
                'image' => 'https://ibericamultimedia.com/wp-content/uploads/2000/03/seagate.jpg',
            ],
            // Añade más marcas según sea necesario
        ];

        DB::table('brands')->insert($brands);
    }
}
