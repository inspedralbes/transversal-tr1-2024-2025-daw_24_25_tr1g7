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
            [
                'name' => 'Razer',
                'slug' => 'razer',
                'url' => 'https://www.razer.com/',
                'image' => 'https://assets2.razerzone.com/images/phoenix/razer-ths-logo.svg',
            ],
            [
                'name' => 'Intel',
                'slug' => 'intel',
                'url' => 'https://www.intel.la/content/www/xl/es/homepage.html',
                'image' => 'https://www.intel.la/content/dam/logos/intel-footer-logo.svg',
            ],
            [
                'name' => 'MSI',
                'slug' => 'msi',
                'url' => 'https://es.msi.com/',
                'image' => 'https://storage-asset.msi.com/frontend/imgs/logo.png',
            ],
            [
                'name' => 'Asus',
                'slug' => 'asus',
                'url' => 'https://www.asus.com/',
                'image' => 'https://www.asus.com/media/Odin/images/header/ROG_hover.svg',
            ],
            [
                'name' => 'EVGA',
                'slug' => 'evga',
                'url' => 'https://www.evga.com/',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/EVGA_Logo.svg/320px-EVGA_Logo.svg.png',
            ],
            [
                'name' => 'CoolerMaster',
                'slug' => 'cooler-master',
                'url' => 'https://www.coolermaster.com/en-eu/',
                'image' => 'https://www.coolermaster.com/icons/logo_white.svg',
            ],
            [
                'name' => 'NZXT',
                'slug' => 'nzxt',
                'url' => 'https://nzxt.com/es-ES',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Logo_NZXT.svg/220px-Logo_NZXT.svg.png',
            ],
            [
                'name' => 'SteelSeries',
                'slug' => 'steelseries',
                'url' => 'https://es.steelseries.com/',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/7f/Steelseries-logo.png/220px-Steelseries-logo.png',
            ],
            [
                'name' => 'Acer',
                'slug' => 'acer',
                'url' => 'https://www.acer.com/es-es',
                'image' => 'https://images.acer.com/is/content/acer/acer-4',
            ],
            [
                'name' => 'LG',
                'slug' => 'lg',
                'url' => 'https://www.lg.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/LG_logo_%282014%29.svg/250px-LG_logo_%282014%29.svg.png',
            ],
            [
                'name' => 'Gigabyte',
                'slug' => 'gigabyte',
                'url' => 'https://www.gigabyte.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Gigabyte_Technology_logo_20080107.svg/270px-Gigabyte_Technology_logo_20080107.svg.png',
            ],
            [
                'name' => 'GSkill',
                'slug' => 'gskill',
                'url' => 'https://www.gskill.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/7/78/G.Skill.gif',
            ],
            [
                'name' => 'Noctua',
                'slug' => 'noctua',
                'url' => 'https://noctua.at',
                'image' => 'https://noctua.at/pub/static/version1713775090/frontend/SIT/noctua/en_US/images/logo.svg',
            ],
            [
                'name' => 'FractalDesign',
                'slug' => 'fractal-design',
                'url' => 'https://www.fractal-design.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Fractal_Design_logo_2019.svg/220px-Fractal_Design_logo_2019.svg.png',
            ],
            [
                'name' => 'Epson',
                'slug' => 'epson',
                'url' => 'https://www.epson.com',
                'image' => 'https://epson.com/global/common/images/logo.png',
            ],
            [
                'name' => 'BenQ',
                'slug' => 'benq',
                'url' => 'https://www.benq.com',
                'image' => 'https://www.benq.eu/etc/designs/g6/clientlib-site/img/header-icon/nav-icon-benq-logo.png',
            ],
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
                'url' => 'https://www.lenovo.com',
                'image' => 'https://p3-ofp.static.pub/fes/cms/2023/03/22/8hjmcte754uauw07ypikjkjtx0m5ib450914.svg',
            ],
            [
                'name' => 'Brother',
                'slug' => 'brother',
                'url' => 'https://www.brother.es/',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Brother_logo.svg/200px-Brother_logo.svg.png',
            ],
            [
                'name' => 'Sapphire',
                'slug' => 'sapphire',
                'url' => 'https://www.sapphiretech.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/1/1e/Sapphiretechnologylogo.jpg/150px-Sapphiretechnologylogo.jpg',
            ],
            [
                'name' => 'Thermaltake',
                'slug' => 'thermaltake',
                'url' => 'https://www.thermaltake.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Cropped-tt-premium-edition-logo-black-1.png/320px-Cropped-tt-premium-edition-logo-black-1.png',
            ],
            [
                'name' => 'BeQuiet!',
                'slug' => 'bequiet',
                'url' => 'https://www.bequiet.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Be-quiet%21_Logo.svg/220px-Be-quiet%21_Logo.svg.png',
            ],
            [
                'name' => 'Phanteks',
                'slug' => 'phanteks',
                'url' => 'https://phanteks.com/',
                'image' => 'https://brandfetch.com/phanteks.store?view=library&library=default&collection=logos&asset=idz2CCHQe_',
            ],
            [
                'name' => 'Canon',
                'slug' => 'canon',
                'url' => 'https://www.canon.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Canon_wordmark.svg/270px-Canon_wordmark.svg.png',
            ],
            [
                'name' => 'ASRock',
                'slug' => 'asrock',
                'url' => 'https://www.asrock.com',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/ASRock_logo.svg/320px-ASRock_logo.svg.png',
            ],
            [
                'name' => 'Seasonic',
                'slug' => 'seasonic',
                'url' => 'https://seasonic.com',
                'image' => 'https://seasonic.com/wp-content/uploads/2024/01/Layer_1-1.svg',
            ],
            [
                'name' => 'Microsoft',
                'slug' => 'microsoft',
                'url' => 'https://www.microsoft.com',
                'image' => 'https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b?ver=5c31',
            ],
            [
                'name' => 'Keychron',
                'slug' => 'keychron',
                'url' => 'https://www.keychron.com',
                'image' => 'https://keychron.com.es/cdn/shop/files/keychron_600_V1.png?v=1712979357&width=150',
            ],            
            
            // Añade más marcas según sea necesario
        ];

        DB::table('brands')->insert($brands);
    }
}
