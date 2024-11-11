<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'idBrand' => 12, // Intel
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i9-12900K',
                'description' => 'Procesador Intel Core de 12ª generación con 16 núcleos.',
                'stock' => 15,
                'price' => 589.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/57/574288/1444-intel-core-i9-12900k-52-ghz.jpg',
            ],
            [
                'idBrand' => 13, // MSI
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'MSI GeForce RTX 3080',
                'description' => 'Tarjeta gráfica con 10GB de VRAM para gaming.',
                'stock' => 25,
                'price' => 699.99,
                'color' => 'Gris',
                'image_path' => 'https://m.media-amazon.com/images/I/81lBqpfoncS.jpg',
            ],
            [
                'idBrand' => 14, // ASUS
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASUS ROG Strix Z590-E',
                'description' => 'Placa base ATX para procesadores Intel.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro',
                'image_path' => 'https://dlcdnwebimgs.asus.com/gain/6F6281D9-75F5-48A9-AF2C-9501C3C52EB5',
            ],
            [
                'idBrand' => 15, // EVGA
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'EVGA 600 W1 80+ WHITE',
                'description' => 'Fuente de alimentación de 600W, eficiencia 80+. ',
                'stock' => 40,
                'price' => 49.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71C4NqjW9pL._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'idBrand' => 16, // Cooler Master
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Cooler Master Hyper 212',
                'description' => 'Disipador de calor para procesadores.',
                'stock' => 20,
                'price' => 39.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/1017/10177102/4477-cooler-master-hyper-212-rgb-black-edition-ventilador-cpu-especificaciones.jpg',
            ],
            [
                'idBrand' => 17, // NZXT
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'NZXT H510',
                'description' => 'Caja para PC con diseño minimalista.',
                'stock' => 35,
                'price' => 89.99,
                'color' => 'Blanco',
                'image_path' => 'https://www.datocms-assets.com/34299/1617970872-h510-white-black-mainw-system.png',
            ],
            [
                'idBrand' => 14, // ASUS
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Asus ROG Zephyrus G14',
                'description' => 'Portátil gaming potente con gráfica dedicada.',
                'stock' => 5,
                'price' => 1499.99,
                'color' => 'Gris',
                'image_path' => 'https://dlcdnwebimgs.asus.com/gain/47215993-C79C-4761-9F1C-EBFA5D2E029B',
            ],
            [
                'idBrand' => 7, // Logitech
                'idSubCategory' => 11, // Ratones
                'name' => 'Logitech G502',
                'description' => 'Ratón gaming ergonómico con iluminación RGB.',
                'stock' => 100,
                'price' => 49.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/51u2DaqSJAL._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'idBrand' => 11, // Razer
                'idSubCategory' => 12, // Teclados
                'name' => 'Razer Huntsman Elite',
                'description' => 'Teclado mecánico con retroiluminación RGB.',
                'stock' => 50,
                'price' => 169.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/61q-Od6kX0L._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'idBrand' => 18, // SteelSeries
                'idSubCategory' => 13, // Auriculares
                'name' => 'SteelSeries Arctis 7',
                'description' => 'Auriculares inalámbricos para gaming con sonido envolvente.',
                'stock' => 25,
                'price' => 149.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1063/10634057/1754-steelseries-arctis-7-auriculares-gaming-inalambricos.jpg',
            ],
            [
                'idBrand' => 6, // HP
                'idSubCategory' => 19, // Impresoras
                'name' => 'HP LaserJet Pro',
                'description' => 'Impresora láser rápida y eficiente.',
                'stock' => 12,
                'price' => 199.99,
                'color' => 'Negro',
                'image_path' => 'https://www.hp.com/es-es/shop/Html/Merch/Images/c06324270_1750x1285.jpg',
            ],
            [
                'idBrand' => 19, // Acer
                'idSubCategory' => 16, // Monitores Gaming
                'name' => 'Acer Predator XB271HU',
                'description' => 'Monitor gaming 27" con resolución 1440p.',
                'stock' => 8,
                'price' => 599.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/12/123326/01.jpg',
            ],
            [
                'idBrand' => 20, // LG
                'idSubCategory' => 17, // Monitores Profesionales
                'name' => 'LG UltraFine 5K',
                'description' => 'Monitor profesional 5K para diseño gráfico.',
                'stock' => 5,
                'price' => 1299.99,
                'color' => 'Gris',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/25/256663/lg-27md5kl-b-27-led-ips-5k-ultrahd-a731eac0-0c19-483d-953f-d24237aa0b6e.jpg',
            ],
            [
                'idBrand' => 4, // AMD
                'idSubCategory' => 1, // Procesadores
                'name' => 'AMD Ryzen 7 5800X',
                'description' => 'Procesador AMD Ryzen de 8 núcleos, ideal para gaming y creación de contenido.',
                'stock' => 20,
                'price' => 449.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/61IIbwz-+ML._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'idBrand' => 14, // ASUS
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'ASUS ROG Strix GeForce RTX 3070',
                'description' => 'Tarjeta gráfica potente para jugar a 1440p con trazado de rayos.',
                'stock' => 18,
                'price' => 499.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/81+AI4OQYfL.jpg',
            ],
            [
                'idBrand' => 21, // Gigabyte
                'idSubCategory' => 3, // Placas Base
                'name' => 'Gigabyte B550 AORUS Elite',
                'description' => 'Placa base con chipset B550 para procesadores AMD.',
                'stock' => 15,
                'price' => 179.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/33/332816/1263-gigabyte-b550-aorus-elite-v2.jpg',
            ],
            [
                'idBrand' => 22, // G.Skill
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'G.Skill Trident Z RGB 32GB',
                'description' => 'Kit de memoria RAM de alto rendimiento con iluminación RGB.',
                'stock' => 30,
                'price' => 129.99,
                'color' => 'Negro/RGB',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/17/174254/1.jpg',
            ],
            [
                'idBrand' => 9, // Corsair
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'Corsair RM750x',
                'description' => 'Fuente de alimentación modular de 750W con certificación 80+ Gold.',
                'stock' => 20,
                'price' => 129.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/39/390900/19-corsair-rmx-series-rm750x-750w-80-plus-gold-modular.jpg',
            ],
            [
                'idBrand' => 23, // Noctua
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Noctua NH-D15',
                'description' => 'Disipador de alto rendimiento con ventiladores silenciosos.',
                'stock' => 12,
                'price' => 89.99,
                'color' => 'Marrón/Beige',
                'image_path' => 'https://m.media-amazon.com/images/I/91Hw1zcAIjL.jpg',
            ],
            [
                'idBrand' => 24, // Fractal Design
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'Fractal Design Meshify C',
                'description' => 'Caja con diseño de malla para un excelente flujo de aire.',
                'stock' => 25,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/91zUa+-t1RL._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'idBrand' => 11, // Razer
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Razer Blade 15',
                'description' => 'Portátil gaming con pantalla Full HD y teclado RGB.',
                'stock' => 6,
                'price' => 1999.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/611B8GYapvL._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'idBrand' => 6, // HP
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'HP Spectre x360',
                'description' => 'Ultrabook convertible con pantalla táctil y rendimiento excepcional.',
                'stock' => 8,
                'price' => 1499.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/1073/10733289/4827-hp-spectre-x360-14-ef2003ns-intel-evo-core-i7-1355u-16-gb-1tb-ssd-135-tactil-especificaciones.jpg',
            ],
            [
                'idBrand' => 11, // Razer
                'idSubCategory' => 11, // Ratones
                'name' => 'Razer DeathAdder V2',
                'description' => 'Ratón gaming ergonómico con sensor óptico de alta precisión.',
                'stock' => 60,
                'price' => 49.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/25/257969/razer-deathadder-v2-raton-gaming-20000dpi-248c0ca1-8de0-4571-a85e-aa88d4e7b2d1.jpg',
            ],
            [
                'idBrand' => 7, // Logitech
                'idSubCategory' => 12, // Teclados
                'name' => 'Logitech G Pro X',
                'description' => 'Teclado mecánico compacto para gaming.',
                'stock' => 40,
                'price' => 129.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/711xULAr4oL.jpg',
            ],
            [
                'idBrand' => 18, // SteelSeries
                'idSubCategory' => 13, // Auriculares
                'name' => 'SteelSeries Arctis 7',
                'description' => 'Auriculares inalámbricos con sonido envolvente y alta comodidad.',
                'stock' => 50,
                'price' => 99.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71Nl1Et9X6L._AC_SL1500_.jpg',
            ],
            [
                'idBrand' => 25, // Epson
                'idSubCategory' => 20, // Impresoras
                'name' => 'Epson EcoTank ET-2720',
                'description' => 'Impresora de tinta con sistema de tanques de tinta para bajo coste por página.',
                'stock' => 15,
                'price' => 249.99,
                'color' => 'Blanco',
                'image_path' => 'https://m.media-amazon.com/images/I/81M19T-4mAL._AC_UF894,1000_QL80_.jpg',
            ],
            [
                'idBrand' => 26, // BenQ
                'idSubCategory' => 16, // Monitores Gaming
                'name' => 'BenQ ZOWIE XL2411P',
                'description' => 'Monitor gaming de 24" con tasa de refresco de 144Hz.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/14/147466/1502098548.jpg',
            ],
            [
                'idBrand' => 5, // Dell
                'idSubCategory' => 17, // Monitores Profesionales
                'name' => 'Dell UltraSharp U2720Q',
                'description' => 'Monitor 4K de 27" ideal para profesionales del diseño.',
                'stock' => 5,
                'price' => 799.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/81wJZ+5FOBL.jpg',
            ],
            [
                'idBrand' => 12, // Intel
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i9-11900K',
                'description' => 'Procesador Intel de 11ª generación con 8 núcleos y alto rendimiento para gaming y trabajo.',
                'stock' => 15,
                'price' => 599.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71diouNMRHL.jpg',
            ],
            [
                'idBrand' => 13, // MSI
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'MSI GeForce RTX 3080',
                'description' => 'Tarjeta gráfica de alto rendimiento para juegos en 4K.',
                'stock' => 10,
                'price' => 799.99,
                'color' => 'Negro/Silver',
                'image_path' => 'https://m.media-amazon.com/images/I/81lBqpfoncS.jpg',
            ],
            [
                'idBrand' => 14, // ASUS
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASUS ROG Crosshair VIII Hero',
                'description' => 'Placa base ATX de gama alta con chipset X570.',
                'stock' => 8,
                'price' => 249.99,
                'color' => 'Negro',
                'image_path' => 'https://dlcdnimgs.asus.com/websites/global/products/et5ltylSSHb6bOGK/img/performance/cooler_pd.png',
            ],
            [
                'idBrand' => 9, // Corsair
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'Corsair Vengeance LPX 16GB',
                'description' => 'Memoria RAM de alto rendimiento para gaming y overclocking.',
                'stock' => 40,
                'price' => 79.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/26/262822/corsair-vengeance-lpx-ddr4-3200-pc4-25600-16gb-2x8gb-cl16-negro.jpg',
            ],
            [
                'idBrand' => 15, // EVGA
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'EVGA SuperNOVA 850 G5',
                'description' => 'Fuente de alimentación de 850W con certificación 80+ Gold y modular.',
                'stock' => 12,
                'price' => 129.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71fFxwowOaL.jpg',
            ],
            [
                'idBrand' => 16, // Cooler Master
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Cooler Master MasterLiquid ML240L',
                'description' => 'Sistema de refrigeración líquida todo en uno de 240mm.',
                'stock' => 18,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/32/329582/1595-cooler-master-masterliquid-ml240l-v2-rgb-kit-de-refrigeracion-liquida-caracteristicas.jpg',
            ],
            [
                'idBrand' => 17,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'NZXT H510',
                'description' => 'Caja ATX moderna y minimalista con panel de vidrio templado.',
                'stock' => 22,
                'price' => 69.99,
                'color' => 'Blanco',
                'image_path' => 'https://nzxt.com/assets/cms/34299/1615563443-h510-elite-white-black-kraken-x-system-purple-lighting-2.png?auto=format&fit=max&w=1200',
                // NZXT
            ],
            [
                'idBrand' => 14,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'ASUS ROG Zephyrus G14',
                'description' => 'Portátil gaming compacto con un rendimiento impresionante y gráficos NVIDIA.',
                'stock' => 5,
                'price' => 1599.99,
                'color' => 'Gris',
                'image_path' => 'https://dlcdnwebimgs.asus.com/gain/47215993-C79C-4761-9F1C-EBFA5D2E029B',
                // ASUS
            ],
            [
                'idBrand' => 27,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'Lenovo Yoga Slim 7',
                'description' => 'Ultrabook ligero y potente con gran duración de batería.',
                'stock' => 7,
                'price' => 1099.99,
                'color' => 'Plata',
                'image_path' => 'https://m.media-amazon.com/images/I/619TjOlx2HL.jpg',
                // Lenovo
            ],
            [
                'idBrand' => 7,
                'idSubCategory' => 11, // Ratones
                'name' => 'Logitech MX Master 3',
                'description' => 'Ratón inalámbrico ergonómico con múltiples funciones.',
                'stock' => 25,
                'price' => 99.99,
                'color' => 'Gris/Negro',
                'image_path' => 'https://resource.logitech.com/content/dam/logitech/en/products/mice/mx-master-3s/gallery/mx-master-3s-mouse-top-view-graphite.png',
                // Logitech
            ],
            [
                'idBrand' => 18,
                'idSubCategory' => 12, // Teclados
                'name' => 'SteelSeries Apex Pro',
                'description' => 'Teclado mecánico personalizable con retroiluminación RGB.',
                'stock' => 20,
                'price' => 199.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71HmUNj01VL.jpg',
                // SteelSeries
            ],
            [
                'idBrand' => 11,
                'idSubCategory' => 13, // Auriculares
                'name' => 'Razer Kraken X',
                'description' => 'Auriculares ligeros y cómodos con sonido envolvente 7.1.',
                'stock' => 45,
                'price' => 59.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/23/232005/razer-kraken-x-lite-2019-render-v02.jpg',
                // Razer
            ],




            [
                'idBrand' => 28,
                'idSubCategory' => 20, // Impresoras
                'name' => 'Brother MFC-J995DW',
                'description' => 'Impresora multifunción con tecnología de tinta a bajo coste.',
                'stock' => 10,
                'price' => 199.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/514Arf7sWlL._AC_SX679_.jpg',
                // Brother
            ],
            [
                'idBrand' => 19,
                'idSubCategory' => 16, // Monitores Gaming
                'name' => 'Acer Nitro VG271U',
                'description' => 'Monitor gaming 1440p de 27" con 144Hz y FreeSync.',
                'stock' => 8,
                'price' => 349.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/17/170832/1.jpg',
                // Acer
            ],
            [
                'idBrand' => 2,
                'idSubCategory' => 17, // Monitores Profesionales
                'name' => 'Samsung Odyssey G9',
                'description' => 'Monitor curvo ultra ancho de 49" para una experiencia envolvente.',
                'stock' => 4,
                'price' => 1399.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/1084/10841386/1354-samsung-odyssey-g9-g95c-49-led-va-ultrawide-dual-qhd-240hz-freesync-premium-pro-curva.jpg',
                // Samsung
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 1, // Procesadores
                'name' => 'AMD Ryzen 5 5600X',
                'description' => 'Procesador de 6 núcleos ideal para juegos y tareas de productividad.',
                'stock' => 25,
                'price' => 299.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/32/328475/1101-amd-ryzen-5-5600x-37ghz.jpg',
                // AMD
            ],
            [
                'idBrand' => 29,
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'Sapphire Pulse Radeon RX 6700 XT',
                'description' => 'Tarjeta gráfica de alto rendimiento con tecnología RDNA 2.',
                'stock' => 15,
                'price' => 479.99,
                'color' => 'Negro/Rojo',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/51/514508/1203-sapphire-pulse-radeon-rx-6700-xt-gaming-oc-12gb-gddr6.jpg',
                // Sapphire
            ],
            [
                'idBrand' => 13,
                'idSubCategory' => 3, // Placas Base
                'name' => 'MSI MAG B550 TOMAHAWK',
                'description' => 'Placa base B550 con soporte para PCIe 4.0 y gran calidad de audio.',
                'stock' => 10,
                'price' => 189.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/30/302202/1130-msi-mag-b550-tomahawk.jpg',
                // MSI
            ],
            [
                'idBrand' => 8,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'Kingston Fury Beast 32GB',
                'description' => 'Memoria RAM DDR4 de alto rendimiento para gaming y multitasking.',
                'stock' => 30,
                'price' => 99.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1082/10825568/1410-kingston-fury-beast-ddr5-6000mhz-32gb-2x16gb-cl30.jpg',
                // Kingston
            ],
            [
                'idBrand' => 30,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'Thermaltake Toughpower GF1 750W',
                'description' => 'Fuente de alimentación modular de 750W con certificación 80+ Gold.',
                'stock' => 18,
                'price' => 139.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/20/202958/1.jpg',
                // Thermaltake
            ],
            [
                'idBrand' => 31,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'be quiet! Dark Rock 4',
                'description' => 'Refrigerador de aire silencioso de alto rendimiento.',
                'stock' => 20,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1084/10848326/1765-be-quiet-dark-rock-5-ventilador-cpu-6-pipes-120mm-negro.jpg',
                // be quiet!
            ],
            [
                'idBrand' => 32,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'Phanteks Eclipse P400A',
                'description' => 'Caja ATX con panel de malla frontal para un flujo de aire óptimo.',
                'stock' => 15,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/25/254484/phanteks-eclipse-p400a-cristal-templado-usb-30-rgb-blanca-a1b6515c-3806-452d-9ebc-37f0d492d58c.jpg',
                // Phanteks
            ],
            [
                'idBrand' => 19,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Acer Predator Helios 300',
                'description' => 'Portátil gaming con pantalla de 15.6" y RTX 3060.',
                'stock' => 6,
                'price' => 1399.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1065/10655558/1673-acer-predator-helios-300-ph315-55-7174-intel-core-i7-12700h-16gb-512gb-ssd-rtx-3060-156-opiniones.jpg',
                // Acer
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'Dell XPS 13',
                'description' => 'Ultrabook premium con pantalla InfinityEdge y alto rendimiento.',
                'stock' => 5,
                'price' => 1299.99,
                'color' => 'Plata',
                'image_path' => 'https://m.media-amazon.com/images/I/71OzM2n+EqL._AC_SY300_SX300_.jpg',
                // Dell
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 11, // Ratones
                'name' => 'Corsair Scimitar RGB Elite',
                'description' => 'Ratón gaming con 12 botones programables y retroiluminación RGB.',
                'stock' => 30,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/26/264405/corsair-scimitar-rgb-elite-raton-gaming-optico-18000dpi.jpg',
                // Corsair
            ],
            [
                'idBrand' => 11,
                'idSubCategory' => 12, // Teclados
                'name' => 'Razer BlackWidow V3',
                'description' => 'Teclado mecánico con retroiluminación RGB y interruptores mecánicos.',
                'stock' => 20,
                'price' => 159.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/36/361533/1456-razer-blackwidow-v3-pro-teclado-mecanico-inalambrico-gaming-switch-green-layout-usa.jpg',
                // Razer
            ],
            [
                'idBrand' => 18,
                'idSubCategory' => 13, // Auriculares
                'name' => 'SteelSeries Arctis 7',
                'description' => 'Auriculares inalámbricos con sonido envolvente y gran duración de batería.',
                'stock' => 35,
                'price' => 149.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1063/10634057/1754-steelseries-arctis-7-auriculares-gaming-inalambricos.jpg',
                // SteelSeries
            ],
            [
                'idBrand' => 33,
                'idSubCategory' => 19, // Impresoras
                'name' => 'Canon PIXMA TR8620',
                'description' => 'Impresora multifuncional con escáner y soporte para impresión inalámbrica.',
                'stock' => 12,
                'price' => 179.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/24/243098/5.jpg',
                // Canon
            ],
            [
                'idBrand' => 20,
                'idSubCategory' => 16, // Monitores Gaming
                'name' => 'LG UltraGear 27GN950-B',
                'description' => 'Monitor 4K de 27" con tasa de refresco de 144Hz, ideal para gamers.',
                'stock' => 8,
                'price' => 799.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/33/337505/1895-lg-27gn750-b-ultragear-27-led-ips-fullhd-240hz-g-sync-compatible.jpg',
                // LG
            ],
            [
                'idBrand' => 14,
                'idSubCategory' => 17, // Monitores Profesionales
                'name' => 'ASUS ProArt PA32UCX',
                'description' => 'Monitor 4K HDR para profesionales de la creación de contenido.',
                'stock' => 4,
                'price' => 2999.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/37/378495/1434-asus-proart-display-pa32ucx-pk-32-led-ips-ultrahd-4k-142hz-usb-c.jpg',
                // ASUS
            ],
            [
                'idBrand' => 12,
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i5-11600K',
                'description' => 'Procesador de 6 núcleos ideal para gaming y tareas de productividad.',
                'stock' => 20,
                'price' => 279.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/36/362356/1204-intel-core-i5-11600k-39-ghz.jpg',
                // Intel
            ],
            [
                'idBrand' => 3,
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'Gigabyte GeForce RTX 3070',
                'description' => 'Tarjeta gráfica de alto rendimiento para gaming en 1440p.',
                'stock' => 12,
                'price' => 649.99,
                'color' => 'Negro/Silver',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/32/324701/1677-gigabyte-geforce-rtx-3070-gaming-oc-8gb-gddr6.jpg',
                // NVIDIA
            ],
            [
                'idBrand' => 34,
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASRock B450M Pro4',
                'description' => 'Placa base AM4 con soporte para procesadores Ryzen y buena conectividad.',
                'stock' => 15,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/30/307137/1178-asrock-b550m-pro4.jpg',
                // ASRock
            ],
            [
                'idBrand' => 22,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'G.Skill Ripjaws V 16GB',
                'description' => 'Memoria RAM DDR4 de alto rendimiento para juegos y aplicaciones exigentes.',
                'stock' => 28,
                'price' => 79.99,
                'color' => 'Rojo',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/60/608186/1346-gskill-ripjaws-v-ddr4-3600mhz-16gb-2x8gb-cl18.jpg',
                // G.Skill
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'Corsair RM750x',
                'description' => 'Fuente de alimentación modular de 750W con certificación 80+ Gold.',
                'stock' => 14,
                'price' => 129.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1065/10658548/1493-corsair-rm750x-shift-750w-80-plus-gold-modular-mejor-precio.jpg',
                // Corsair
            ],
            [
                'idBrand' => 23,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Noctua NH-D15',
                'description' => 'Refrigerador de aire de alto rendimiento con un diseño eficiente.',
                'stock' => 8,
                'price' => 89.99,
                'color' => 'Marrón',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/24/245205/1.jpg',
                // Noctua
            ],
            [
                'idBrand' => 16,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'Cooler Master MasterBox Q300L',
                'description' => 'Caja compacta ATX con paneles laterales de acrílico y gran flujo de aire.',
                'stock' => 20,
                'price' => 69.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/15/157976/cooler-master-masterbox-q300p-usb-30-con-ventana-5c90da1d-dc4b-44f5-a9b4-195bcf3b32fc.jpg',
                // Cooler Master
            ],
            [
                'idBrand' => 13,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'MSI GF65 Thin',
                'description' => 'Portátil gaming ligero con pantalla de 15.6" y RTX 3060.',
                'stock' => 7,
                'price' => 1399.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1002/10023603/1390-msi-gf63-thin-11ud-271xes-intel-core-i7-11800h-16-gb-512gb-ssd-rtx-3050ti-156.jpg',
                // MSI
            ],
            [
                'idBrand' => 6,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'HP Spectre x360',
                'description' => 'Ultrabook convertible con pantalla táctil y alto rendimiento.',
                'stock' => 5,
                'price' => 1399.99,
                'color' => 'Plata',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1073/10733289/1187-hp-spectre-x360-14-ef2003ns-intel-evo-core-i7-1355u-16-gb-1tb-ssd-135-tactil-590e635b-0ec2-45bc-9af6-41b29d9cbec0.jpg',
                // HP
            ],
            [
                'idBrand' => 11,
                'idSubCategory' => 11, // Ratones
                'name' => 'Razer DeathAdder V2',
                'description' => 'Ratón gaming con sensor óptico y diseño ergonómico.',
                'stock' => 25,
                'price' => 69.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/25/257969/razer-deathadder-v2-raton-gaming-20000dpi-248c0ca1-8de0-4571-a85e-aa88d4e7b2d1.jpg',
                // Razer
            ],
            [
                'idBrand' => 7,
                'idSubCategory' => 12, // Teclados
                'name' => 'Logitech G Pro X',
                'description' => 'Teclado mecánico compacto con interruptores intercambiables.',
                'stock' => 18,
                'price' => 149.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1077/10772985/1393-logitech-g-pro-x-tkl-lightspeed-teclado-inalambrico-gaming-negro-rgb-lightsync-gx-brown.jpg',
                // Logitech
            ],
            [
                'idBrand' => 6,
                'idSubCategory' => 13, // Auriculares
                'name' => 'HyperX Cloud II',
                'description' => 'Auriculares gaming con sonido envolvente y almohadillas de espuma.',
                'stock' => 30,
                'price' => 99.99,
                'color' => 'Negro/Rojo',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1074/10749670/1881-hyperx-cloud-ii-core-auriculares-gaming-inalambricos-dts-negro-rojo.jpg',
                // HyperX
            ],
            [
                'idBrand' => 25,
                'idSubCategory' => 20, // Impresoras
                'name' => 'Epson EcoTank ET-2720',
                'description' => 'Impresora de inyección de tinta con tanque de tinta recargable para bajo coste por impresión.',
                'stock' => 10,
                'price' => 249.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1081/10811900/1877-epson-ekotank-et-2870-impresora-multifuncion-color-wifi.jpg',
                // Epson
            ],
            [
                'idBrand' => 19,
                'idSubCategory' => 16, // Monitores Gaming
                'name' => 'Acer Predator XB273U',
                'description' => 'Monitor gaming IPS 1440p de 27" con alta tasa de refresco.',
                'stock' => 6,
                'price' => 699.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1082/10826572/1307-acer-gaming-predator-xb273uv3bmiiprzx-27-led-ips-qhd-180hz-05ms-freesync-premium-opiniones.jpg',
                // Acer
            ],
            [
                'idBrand' => 26,
                'idSubCategory' => 17, // Monitores Profesionales
                'name' => 'BenQ PD3220U',
                'description' => 'Monitor 4K de 32" para diseñadores y creadores de contenido.',
                'stock' => 3,
                'price' => 1199.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/21/211997/1.jpg',
                // BenQ
            ],
            [
                'idBrand' => 12,
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i7-11700K',
                'description' => 'Procesador de 8 núcleos con alto rendimiento para juegos y tareas multitarea.',
                'stock' => 15,
                'price' => 399.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/36/362379/1371-intel-core-i7-11700f-25-ghz.jpg',
                // Intel
            ],
            [
                'idBrand' => 3,
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'EVGA GeForce RTX 3080',
                'description' => 'Tarjeta gráfica de alta gama, ideal para gaming en 4K.',
                'stock' => 8,
                'price' => 899.99,
                'color' => 'Negro/Silver',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1002/10026489/1329-evga-geforce-rtx-3080-ftw3-ultra-gaming-12gb-gddr6x.jpg',
                // NVIDIA
            ],
            [
                'idBrand' => 14,
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASUS ROG Strix Z490-E',
                'description' => 'Placa base Z490 con overclocking y RGB customizable.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro/Rojo',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/28/287454/asus-rog-strix-z490-e-gaming.jpg',
                // ASUS
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'Corsair Vengeance LPX 16GB',
                'description' => 'Memoria RAM DDR4 de bajo perfil, ideal para sistemas compactos.',
                'stock' => 40,
                'price' => 74.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/17/173466/1.jpg',
                // Corsair
            ],
            [
                'idBrand' => 35,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'Seasonic Focus GX-750',
                'description' => 'Fuente de alimentación modular de 750W con certificación 80+ Gold.',
                'stock' => 20,
                'price' => 119.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1085/10858947/1737-seasonic-focus-gx-750-atx-3-pcie-51-750w-80-plus-gold-modular.jpg',
                // Seasonic
            ],
            [
                'idBrand' => 16,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Cooler Master Hyper 212 RGB',
                'description' => 'Refrigerador de aire con iluminación RGB y gran rendimiento.',
                'stock' => 25,
                'price' => 59.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1017/10177102/1914-cooler-master-hyper-212-rgb-black-edition-ventilador-cpu.jpg',
                // Cooler Master
            ],
            [
                'idBrand' => 17,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'NZXT H510',
                'description' => 'Caja ATX moderna con panel de vidrio templado.',
                'stock' => 22,
                'price' => 89.99,
                'color' => 'Blanco',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/22/229796/1.jpg',
                // NZXT
            ],
            [
                'idBrand' => 27,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Lenovo Legion 5',
                'description' => 'Portátil gaming de 15.6" con RTX 3060 y teclado retroiluminado.',
                'stock' => 6,
                'price' => 1299.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1018/10188907/1142-lenovo-legion-5-15ith6h-intel-core-i7-11800h-16gb-1tb-ssd-rtx3060-156.jpg',
                // Lenovo
            ],
            [
                'idBrand' => 36,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'Microsoft Surface Laptop 4',
                'description' => 'Ultrabook elegante con pantalla táctil y gran duración de batería.',
                'stock' => 4,
                'price' => 1399.99,
                'color' => 'Plata',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/41/410563/1421-microsoft-surface-laptop-4-platino-intel-core-i5-1145g7-16gb-512gb-ssd-135-tactil.jpg',
                // Microsoft
            ],
            [
                'idBrand' => 7,
                'idSubCategory' => 11, // Ratones
                'name' => 'Logitech MX Master 3',
                'description' => 'Ratón ergonómico para productividad con múltiples dispositivos.',
                'stock' => 30,
                'price' => 99.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/23/231260/2842-logitech-mx-master-3-raton-inalambrico-avanzado-4000dpi-grafito-b1848025-a7d5-465c-8c0d-cec90a5ec6ac.jpg',
                // Logitech
            ],
            [
                'idBrand' => 37,
                'idSubCategory' => 12, // Teclados
                'name' => 'Keychron K6',
                'description' => 'Teclado mecánico compacto, compatible con múltiples dispositivos.',
                'stock' => 20,
                'price' => 79.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1081/10817672/1175-keychron-k8-pro-qmk-via-teclado-mecanico-inalambrico-fully-assembled-hot-swappable-rgb-gateron-g-pro-red-e683390b-0f22-42c8-84c5-4ce1a8b25fa9.jpg',
                // Keychron
            ],
            [
                'idBrand' => 28,
                'idSubCategory' => 19, // Impresoras
                'name' => 'Brother MFC-L3770CDW',
                'description' => 'Impresora láser multifuncional color con conectividad inalámbrica.',
                'stock' => 8,
                'price' => 399.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/17/170188/60172239-0057568797.jpg',
                // Brother
            ],
            [
                'idBrand' => 19,
                'idSubCategory' => 16, // Monitores Gaming
                'name' => 'Acer Nitro VG271',
                'description' => 'Monitor gaming IPS Full HD de 27" con tasa de refresco de 75Hz.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1072/10722562/199-acer-nitro-vg271um3-27-led-ips-qhd-180hz-freesync-premium-c58eb17c-7a2d-4694-a341-1e590d65a51e.jpg',
                // Acer
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 17, // Monitores Profesionales
                'name' => 'Dell UltraSharp U2720Q',
                'description' => 'Monitor 4K de 27" con alta precisión de color para profesionales.',
                'stock' => 5,
                'price' => 799.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-150-150/articles/1018/10189017/1960-dell-ultrasharp-u2723qe-27-led-ips-ultrahd-4k-usb-c.jpg',
                // Dell
            ],
        ];

        DB::table('productes')->insert($products);
    }
}
