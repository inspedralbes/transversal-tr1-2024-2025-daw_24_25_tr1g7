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
                'idBrand' => 4,
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i9-12900K',
                'description' => 'Procesador Intel Core de 12ª generación con 16 núcleos.',
                'stock' => 15,
                'price' => 589.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/57/574288/1444-intel-core-i9-12900k-52-ghz.jpg',
                 // AMD
            ],
            [
                'idBrand' => 3,
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'MSI GeForce RTX 3080',
                'description' => 'Tarjeta gráfica con 10GB de VRAM para gaming.',
                'stock' => 25,
                'price' => 699.99,
                'color' => 'Gris',
                'image_path' => 'https://m.media-amazon.com/images/I/81lBqpfoncS.jpg',
                 // NVIDIA
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASUS ROG Strix Z590-E',
                'description' => 'Placa base ATX para procesadores Intel.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro',
                'image_path' => 'https://dlcdnwebimgs.asus.com/gain/6F6281D9-75F5-48A9-AF2C-9501C3C52EB5',
                 // AMD
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'Corsair Vengeance LPX 16GB',
                'description' => 'Memoria RAM DDR4 de 16GB para alto rendimiento.',
                'stock' => 50,
                'price' => 79.99,
                'color' => 'Rojo',
                'image_path' => 'https://img.pccomponentes.com/articles/26/262822/corsair-vengeance-lpx-ddr4-3200-pc4-25600-16gb-2x8gb-cl16-negro.jpg',
                 // Corsair
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'EVGA 600 W1 80+ WHITE',
                'description' => 'Fuente de alimentación de 600W, eficiencia 80+. ',
                'stock' => 40,
                'price' => 49.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71C4NqjW9pL._AC_UF894,1000_QL80_.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Cooler Master Hyper 212',
                'description' => 'Disipador de calor para procesadores.',
                'stock' => 20,
                'price' => 39.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/1017/10177102/4477-cooler-master-hyper-212-rgb-black-edition-ventilador-cpu-especificaciones.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'NZXT H510',
                'description' => 'Caja para PC con diseño minimalista.',
                'stock' => 35,
                'price' => 89.99,
                'color' => 'Blanco',
                'image_path' => 'https://www.datocms-assets.com/34299/1617970872-h510-white-black-mainw-system.png',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Asus ROG Zephyrus G14',
                'description' => 'Portátil gaming potente con gráfica dedicada.',
                'stock' => 5,
                'price' => 1499.99,
                'color' => 'Gris',
                'image_path' => 'https://dlcdnwebimgs.asus.com/gain/47215993-C79C-4761-9F1C-EBFA5D2E029B',
                 // AMD
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'Dell XPS 13',
                'description' => 'Ultrabook elegante y potente con pantalla 4K.',
                'stock' => 10,
                'price' => 1399.99,
                'color' => 'Negro',
                'image_path' => 'https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/13-9340/media-gallery/silver/touch/notebook-xps-13-9340-t-sl-gallery-4.psd?fmt=pjpg&pscan=auto&scl=1&wid=3509&hei=2082&qlt=100,1&resMode=sharp2&size=3509,2082&chrss=full&imwidth=5000',
                 // Dell
            ],
            [
                'idBrand' => 6,
                'idSubCategory' => 10, // Ratones
                'name' => 'Logitech G502',
                'description' => 'Ratón gaming ergonómico con iluminación RGB.',
                'stock' => 100,
                'price' => 49.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/51u2DaqSJAL._AC_UF894,1000_QL80_.jpg',
                 // Logitech
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 11, // Teclados
                'name' => 'Razer Huntsman Elite',
                'description' => 'Teclado mecánico con retroiluminación RGB.',
                'stock' => 50,
                'price' => 169.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/61q-Od6kX0L._AC_UF894,1000_QL80_.jpg',
                 // AMD
            ],
            [
                'idBrand' => 8,
                'idSubCategory' => 12, // Auriculares
                'name' => 'SteelSeries Arctis 7',
                'description' => 'Auriculares inalámbricos para gaming con sonido envolvente.',
                'stock' => 25,
                'price' => 149.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71cIxP7E2+L.jpg',
                 // Kingston
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 13, // Impresoras
                'name' => 'HP LaserJet Pro',
                'description' => 'Impresora láser rápida y eficiente.',
                'stock' => 12,
                'price' => 199.99,
                'color' => 'Negro',
                'image_path' => 'https://www.hp.com/es-es/shop/Html/Merch/Images/c06324270_1750x1285.jpg',
                 // HP
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 14, // Monitores Gaming
                'name' => 'Acer Predator XB271HU',
                'description' => 'Monitor gaming 27" con resolución 1440p.',
                'stock' => 8,
                'price' => 599.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/12/123326/01.jpg',
                 // AMD
            ],
            [
                'idBrand' => 2,
                'idSubCategory' => 15, // Monitores Profesionales
                'name' => 'LG UltraFine 5K',
                'description' => 'Monitor profesional 5K para diseño gráfico.',
                'stock' => 5,
                'price' => 1299.99,
                'color' => 'Gris',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/25/256663/lg-27md5kl-b-27-led-ips-5k-ultrahd-a731eac0-0c19-483d-953f-d24237aa0b6e.jpg',
                 // Samsung
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 1, // Procesadores
                'name' => 'AMD Ryzen 7 5800X',
                'description' => 'Procesador AMD Ryzen de 8 núcleos, ideal para gaming y creación de contenido.',
                'stock' => 20,
                'price' => 449.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/61IIbwz-+ML._AC_UF894,1000_QL80_.jpg',
                 // AMD
            ],
            [
                'idBrand' => 3,
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'ASUS ROG Strix GeForce RTX 3070',
                'description' => 'Tarjeta gráfica potente para jugar a 1440p con trazado de rayos.',
                'stock' => 18,
                'price' => 499.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/81+AI4OQYfL.jpg',
                 // NVIDIA
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 3, // Placas Base
                'name' => 'Gigabyte B550 AORUS Elite',
                'description' => 'Placa base con chipset B550 para procesadores AMD.',
                'stock' => 15,
                'price' => 179.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/33/332816/1263-gigabyte-b550-aorus-elite-v2.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'G.Skill Trident Z RGB 32GB',
                'description' => 'Kit de memoria RAM de alto rendimiento con iluminación RGB.',
                'stock' => 30,
                'price' => 129.99,
                'color' => 'Negro/RGB',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/17/174254/1.jpg',
                 // AMD
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'Corsair RM750x',
                'description' => 'Fuente de alimentación modular de 750W con certificación 80+ Gold.',
                'stock' => 20,
                'price' => 129.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/39/390900/19-corsair-rmx-series-rm750x-750w-80-plus-gold-modular.jpg',
                 // Corsair
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Noctua NH-D15',
                'description' => 'Disipador de alto rendimiento con ventiladores silenciosos.',
                'stock' => 12,
                'price' => 89.99,
                'color' => 'Marrón/Beige',
                'image_path' => 'https://m.media-amazon.com/images/I/91Hw1zcAIjL.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'Fractal Design Meshify C',
                'description' => 'Caja con diseño de malla para un excelente flujo de aire.',
                'stock' => 25,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/91zUa+-t1RL._AC_UF894,1000_QL80_.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Razer Blade 15',
                'description' => 'Portátil gaming con pantalla Full HD y teclado RGB.',
                'stock' => 6,
                'price' => 1999.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/611B8GYapvL._AC_UF894,1000_QL80_.jpg',
                 // AMD
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'HP Spectre x360',
                'description' => 'Ultrabook convertible con pantalla táctil y rendimiento excepcional.',
                'stock' => 8,
                'price' => 1499.99,
                'color' => 'Negro',
                'image_path' => 'https://thumb.pccomponentes.com/w-530-530/articles/1073/10733289/4827-hp-spectre-x360-14-ef2003ns-intel-evo-core-i7-1355u-16-gb-1tb-ssd-135-tactil-especificaciones.jpg',
                 // HP
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 10, // Ratones
                'name' => 'Razer DeathAdder V2',
                'description' => 'Ratón gaming ergonómico con sensor óptico de alta precisión.',
                'stock' => 60,
                'price' => 49.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/25/257969/razer-deathadder-v2-raton-gaming-20000dpi-248c0ca1-8de0-4571-a85e-aa88d4e7b2d1.jpg',
                 // AMD
            ],
            [
                'idBrand' => 6,
                'idSubCategory' => 11, // Teclados
                'name' => 'Logitech G Pro X',
                'description' => 'Teclado mecánico compacto para gaming.',
                'stock' => 40,
                'price' => 129.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/711xULAr4oL.jpg',
                 // Logitech
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 12, // Auriculares
                'name' => 'HyperX Cloud II',
                'description' => 'Auriculares con sonido envolvente y comodidad excepcional.',
                'stock' => 50,
                'price' => 99.99,
                'color' => 'Rojo',
                'image_path' => 'https://img.pccomponentes.com/articles/1004/10042288/1682-hyperx-cloud-ii-auriculares-gaming-71-rojos.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 13, // Impresoras
                'name' => 'Epson EcoTank ET-2720',
                'description' => 'Impresora de tinta con sistema de tanques de tinta para bajo coste por página.',
                'stock' => 15,
                'price' => 249.99,
                'color' => 'Blanco',
                'image_path' => 'https://m.media-amazon.com/images/I/81M19T-4mAL._AC_UF894,1000_QL80_.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 14, // Monitores Gaming
                'name' => 'BenQ ZOWIE XL2411P',
                'description' => 'Monitor gaming de 24" con tasa de refresco de 144Hz.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/14/147466/1502098548.jpg',
                 // AMD
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 15, // Monitores Profesionales
                'name' => 'Dell UltraSharp U2720Q',
                'description' => 'Monitor 4K de 27" ideal para profesionales del diseño.',
                'stock' => 5,
                'price' => 799.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/81wJZ+5FOBL.jpg',
                 // Dell
            ],

            [
                'idBrand' => 4,
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i9-11900K',
                'description' => 'Procesador Intel de 11ª generación con 8 núcleos y alto rendimiento para gaming y trabajo.',
                'stock' => 15,
                'price' => 599.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71diouNMRHL.jpg',
                 // AMD
            ],
            [
                'idBrand' => 3,
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'MSI GeForce RTX 3080',
                'description' => 'Tarjeta gráfica de alto rendimiento para juegos en 4K.',
                'stock' => 10,
                'price' => 799.99,
                'color' => 'Negro/Silver',
                'image_path' => 'https://m.media-amazon.com/images/I/81lBqpfoncS.jpg',
                 // NVIDIA
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASUS ROG Crosshair VIII Hero',
                'description' => 'Placa base ATX de gama alta con chipset X570.',
                'stock' => 8,
                'price' => 249.99,
                'color' => 'Negro',
                'image_path' => 'https://dlcdnimgs.asus.com/websites/global/products/et5ltylSSHb6bOGK/img/performance/cooler_pd.png',
                 // AMD
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'Corsair Vengeance LPX 16GB',
                'description' => 'Memoria RAM de alto rendimiento para gaming y overclocking.',
                'stock' => 40,
                'price' => 79.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/26/262822/corsair-vengeance-lpx-ddr4-3200-pc4-25600-16gb-2x8gb-cl16-negro.jpg',
                 // Corsair
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'EVGA SuperNOVA 850 G5',
                'description' => 'Fuente de alimentación de 850W con certificación 80+ Gold y modular.',
                'stock' => 12,
                'price' => 129.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71fFxwowOaL.jpg',
                 // Corsair
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Cooler Master MasterLiquid ML240L',
                'description' => 'Sistema de refrigeración líquida todo en uno de 240mm.',
                'stock' => 18,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/32/329582/1595-cooler-master-masterliquid-ml240l-v2-rgb-kit-de-refrigeracion-liquida-caracteristicas.jpg',
                 // Corsair
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'NZXT H510',
                'description' => 'Caja ATX moderna y minimalista con panel de vidrio templado.',
                'stock' => 22,
                'price' => 69.99,
                'color' => 'Blanco',
                'image_path' => 'https://nzxt.com/assets/cms/34299/1615563443-h510-elite-white-black-kraken-x-system-purple-lighting-2.png?auto=format&fit=max&w=1200',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'ASUS ROG Zephyrus G14',
                'description' => 'Portátil gaming compacto con un rendimiento impresionante y gráficos NVIDIA.',
                'stock' => 5,
                'price' => 1599.99,
                'color' => 'Gris',
                'image_path' => 'https://dlcdnwebimgs.asus.com/gain/47215993-C79C-4761-9F1C-EBFA5D2E029B',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'Lenovo Yoga Slim 7',
                'description' => 'Ultrabook ligero y potente con gran duración de batería.',
                'stock' => 7,
                'price' => 1099.99,
                'color' => 'Plata',
                'image_path' => 'https://m.media-amazon.com/images/I/619TjOlx2HL.jpg',
                 // AMD
            ],
            [
                'idBrand' => 6,
                'idSubCategory' => 10, // Ratones
                'name' => 'Logitech MX Master 3',
                'description' => 'Ratón inalámbrico ergonómico con múltiples funciones.',
                'stock' => 25,
                'price' => 99.99,
                'color' => 'Gris/Negro',
                'image_path' => 'https://resource.logitech.com/content/dam/logitech/en/products/mice/mx-master-3s/gallery/mx-master-3s-mouse-top-view-graphite.png',
                 // Logitech
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 11, // Teclados
                'name' => 'SteelSeries Apex Pro',
                'description' => 'Teclado mecánico personalizable con retroiluminación RGB.',
                'stock' => 20,
                'price' => 199.99,
                'color' => 'Negro',
                'image_path' => 'https://m.media-amazon.com/images/I/71HmUNj01VL.jpg',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 12, // Auriculares
                'name' => 'Razer Kraken X',
                'description' => 'Auriculares ligeros y cómodos con sonido envolvente 7.1.',
                'stock' => 45,
                'price' => 59.99,
                'color' => 'Negro',
                'image_path' => 'https://img.pccomponentes.com/articles/23/232005/razer-kraken-x-lite-2019-render-v02.jpg',
                 // AMD
            ],











            [
                'idBrand' => 4,
                'idSubCategory' => 13, // Impresoras
                'name' => 'Brother MFC-J995DW',
                'description' => 'Impresora multifunción con tecnología de tinta a bajo coste.',
                'stock' => 10,
                'price' => 199.99,
                'color' => 'Negro',
                'image_path' => 'path/to/brother-mfc-j995dw.png',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 14, // Monitores Gaming
                'name' => 'Acer Nitro VG271U',
                'description' => 'Monitor gaming 1440p de 27" con 144Hz y FreeSync.',
                'stock' => 8,
                'price' => 349.99,
                'color' => 'Negro',
                'image_path' => 'path/to/acer-nitro-vg271u.png',
                 // AMD
            ],
            [
                'idBrand' => 2,
                'idSubCategory' => 15, // Monitores Profesionales
                'name' => 'Samsung Odyssey G9',
                'description' => 'Monitor curvo ultra ancho de 49" para una experiencia envolvente.',
                'stock' => 4,
                'price' => 1399.99,
                'color' => 'Negro',
                'image_path' => 'path/to/samsung-odyssey-g9.png',
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
                'image_path' => 'path/to/ryzen5-5600x.png',
                 // AMD
            ],
            [
                'idBrand' => 3,
                'idSubCategory' => 2, // Tarjetas Gráficas
                'name' => 'Sapphire Pulse Radeon RX 6700 XT',
                'description' => 'Tarjeta gráfica de alto rendimiento con tecnología RDNA 2.',
                'stock' => 15,
                'price' => 479.99,
                'color' => 'Negro/Rojo',
                'image_path' => 'path/to/rx6700xt.png',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 3, // Placas Base
                'name' => 'MSI MAG B550 TOMAHAWK',
                'description' => 'Placa base B550 con soporte para PCIe 4.0 y gran calidad de audio.',
                'stock' => 10,
                'price' => 189.99,
                'color' => 'Negro',
                'image_path' => 'path/to/msi-mag-b550-tomahawk.png',
                 // AMD
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'Kingston Fury Beast 32GB',
                'description' => 'Memoria RAM DDR4 de alto rendimiento para gaming y multitasking.',
                'stock' => 30,
                'price' => 99.99,
                'color' => 'Negro',
                'image_path' => 'path/to/kingston-fury-beast.png',
                 // Kingston
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'Thermaltake Toughpower GF1 750W',
                'description' => 'Fuente de alimentación modular de 750W con certificación 80+ Gold.',
                'stock' => 18,
                'price' => 139.99,
                'color' => 'Negro',
                'image_path' => 'path/to/thermaltake-toughpower.png',
                 // Thermaltake
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'be quiet! Dark Rock 4',
                'description' => 'Refrigerador de aire silencioso de alto rendimiento.',
                'stock' => 20,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'path/to/bequiet-dark-rock4.png',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'Phanteks Eclipse P400A',
                'description' => 'Caja ATX con panel de malla frontal para un flujo de aire óptimo.',
                'stock' => 15,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'path/to/phanteks-eclipse-p400a.png',
                 // AMD
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Acer Predator Helios 300',
                'description' => 'Portátil gaming con pantalla de 15.6" y RTX 3060.',
                'stock' => 6,
                'price' => 1399.99,
                'color' => 'Negro',
                'image_path' => 'path/to/acer-predator-helios300.png',
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
                'image_path' => 'path/to/dell-xps-13.png',
                 // Dell
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 10, // Ratones
                'name' => 'Corsair Scimitar RGB Elite',
                'description' => 'Ratón gaming con 12 botones programables y retroiluminación RGB.',
                'stock' => 30,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'path/to/corsair-scimitar.png',
                 // Corsair
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 11, // Teclados
                'name' => 'Razer BlackWidow V3',
                'description' => 'Teclado mecánico con retroiluminación RGB y interruptores mecánicos.',
                'stock' => 20,
                'price' => 159.99,
                'color' => 'Negro',
                'image_path' => 'path/to/razer-blackwidow-v3.png',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 12, // Auriculares
                'name' => 'SteelSeries Arctis 7',
                'description' => 'Auriculares inalámbricos con sonido envolvente y gran duración de batería.',
                'stock' => 35,
                'price' => 149.99,
                'color' => 'Negro',
                'image_path' => 'path/to/steelseries-arctis-7.png',
                 // AMD
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 13, // Impresoras
                'name' => 'Canon PIXMA TR8620',
                'description' => 'Impresora multifuncional con escáner y soporte para impresión inalámbrica.',
                'stock' => 12,
                'price' => 179.99,
                'color' => 'Negro',
                'image_path' => 'path/to/canon-pixma-tr8620.png',
                 // AMD
            ],
            [
                'idBrand' => 8,
                'idSubCategory' => 14, // Monitores Gaming
                'name' => 'LG UltraGear 27GN950-B',
                'description' => 'Monitor 4K de 27" con tasa de refresco de 144Hz, ideal para gamers.',
                'stock' => 8,
                'price' => 799.99,
                'color' => 'Negro',
                'image_path' => 'path/to/lg-ultragear-27gn950b.png',
                 // LG
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 15, // Monitores Profesionales
                'name' => 'ASUS ProArt PA32UCX',
                'description' => 'Monitor 4K HDR para profesionales de la creación de contenido.',
                'stock' => 4,
                'price' => 2999.99,
                'color' => 'Negro',
                'image_path' => 'path/to/asus-proart-pa32ucx.png',
                 // AMD
            ],


            [
                'idBrand' => 4,
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i5-11600K',
                'description' => 'Procesador de 6 núcleos ideal para gaming y tareas de productividad.',
                'stock' => 20,
                'price' => 279.99,
                'color' => 'Negro',
                'image_path' => 'path/to/i5-11600k.png',
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
                'image_path' => 'path/to/rtx3070.png',
                 // NVIDIA
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASRock B450M Pro4',
                'description' => 'Placa base AM4 con soporte para procesadores Ryzen y buena conectividad.',
                'stock' => 15,
                'price' => 89.99,
                'color' => 'Negro',
                'image_path' => 'path/to/asrock-b450m.png',
                 // AMD
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 4, // Memoria RAM
                'name' => 'G.Skill Ripjaws V 16GB',
                'description' => 'Memoria RAM DDR4 de alto rendimiento para juegos y aplicaciones exigentes.',
                'stock' => 28,
                'price' => 79.99,
                'color' => 'Rojo',
                'image_path' => 'path/to/gskill-ripjaws-v.png',
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
                'image_path' => 'path/to/corsair-rm750x.png',
                 // Corsair
            ],
            [
                'idBrand' => 7,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Noctua NH-D15',
                'description' => 'Refrigerador de aire de alto rendimiento con un diseño eficiente.',
                'stock' => 8,
                'price' => 89.99,
                'color' => 'Marrón',
                'image_path' => 'path/to/noctua-nh-d15.png',
                 // Noctua
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'Cooler Master MasterBox Q300L',
                'description' => 'Caja compacta ATX con paneles laterales de acrílico y gran flujo de aire.',
                'stock' => 20,
                'price' => 69.99,
                'color' => 'Negro',
                'image_path' => 'path/to/masterbox-q300l.png',
                 // Cooler Master
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'MSI GF65 Thin',
                'description' => 'Portátil gaming ligero con pantalla de 15.6" y RTX 3060.',
                'stock' => 7,
                'price' => 1399.99,
                'color' => 'Negro',
                'image_path' => 'path/to/msi-gf65-thin.png',
                 // MSI
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'HP Spectre x360',
                'description' => 'Ultrabook convertible con pantalla táctil y alto rendimiento.',
                'stock' => 5,
                'price' => 1399.99,
                'color' => 'Plata',
                'image_path' => 'path/to/hp-spectre-x360.png',
                 // HP
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 10, // Ratones
                'name' => 'Razer DeathAdder V2',
                'description' => 'Ratón gaming con sensor óptico y diseño ergonómico.',
                'stock' => 25,
                'price' => 69.99,
                'color' => 'Negro',
                'image_path' => 'path/to/razer-deathadder-v2.png',
                 // Razer
            ],
            [
                'idBrand' => 6,
                'idSubCategory' => 11, // Teclados
                'name' => 'Logitech G Pro X',
                'description' => 'Teclado mecánico compacto con interruptores intercambiables.',
                'stock' => 18,
                'price' => 149.99,
                'color' => 'Negro',
                'image_path' => 'path/to/logitech-g-pro-x.png',
                 // Logitech
            ],
            [
                'idBrand' => 7,
                'idSubCategory' => 12, // Auriculares
                'name' => 'HyperX Cloud II',
                'description' => 'Auriculares gaming con sonido envolvente y almohadillas de espuma.',
                'stock' => 30,
                'price' => 99.99,
                'color' => 'Negro/Rojo',
                'image_path' => 'path/to/hyperx-cloud-ii.png',
                 // HyperX
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 13, // Impresoras
                'name' => 'Epson EcoTank ET-2720',
                'description' => 'Impresora de inyección de tinta con tanque de tinta recargable para bajo coste por impresión.',
                'stock' => 10,
                'price' => 249.99,
                'color' => 'Negro',
                'image_path' => 'path/to/epson-ecotank-et2720.png',
                 // Epson
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 14, // Monitores Gaming
                'name' => 'Acer Predator XB273U',
                'description' => 'Monitor gaming IPS 1440p de 27" con alta tasa de refresco.',
                'stock' => 6,
                'price' => 699.99,
                'color' => 'Negro',
                'image_path' => 'path/to/acer-predator-xb273u.png',
                 // Acer
            ],
            [
                'idBrand' => 8,
                'idSubCategory' => 15, // Monitores Profesionales
                'name' => 'BenQ PD3220U',
                'description' => 'Monitor 4K de 32" para diseñadores y creadores de contenido.',
                'stock' => 3,
                'price' => 1199.99,
                'color' => 'Negro',
                'image_path' => 'path/to/benq-pd3220u.png',
                 // BenQ
            ],


            [
                'idBrand' => 4,
                'idSubCategory' => 1, // Procesadores
                'name' => 'Intel Core i7-11700K',
                'description' => 'Procesador de 8 núcleos con alto rendimiento para juegos y tareas multitarea.',
                'stock' => 15,
                'price' => 399.99,
                'color' => 'Negro',
                'image_path' => 'path/to/i7-11700k.png',
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
                'image_path' => 'path/to/evga-rtx3080.png',
                 // NVIDIA
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 3, // Placas Base
                'name' => 'ASUS ROG Strix Z490-E',
                'description' => 'Placa base Z490 con overclocking y RGB customizable.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro/Rojo',
                'image_path' => 'path/to/asus-rog-strix-z490e.png',
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
                'image_path' => 'path/to/corsair-vengeance-lpx.png',
                 // Corsair
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 5, // Fuentes de Alimentación
                'name' => 'Seasonic Focus GX-750',
                'description' => 'Fuente de alimentación modular de 750W con certificación 80+ Gold.',
                'stock' => 20,
                'price' => 119.99,
                'color' => 'Negro',
                'image_path' => 'path/to/seasonic-focus-gx750.png',
                 // Seasonic
            ],
            [
                'idBrand' => 9,
                'idSubCategory' => 6, // Refrigeración
                'name' => 'Cooler Master Hyper 212 RGB',
                'description' => 'Refrigerador de aire con iluminación RGB y gran rendimiento.',
                'stock' => 25,
                'price' => 59.99,
                'color' => 'Negro',
                'image_path' => 'path/to/coolermaster-hyper-212-rgb.png',
                 // Cooler Master
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 7, // Cajas de PC
                'name' => 'NZXT H510',
                'description' => 'Caja ATX moderna con panel de vidrio templado.',
                'stock' => 22,
                'price' => 89.99,
                'color' => 'Blanco',
                'image_path' => 'path/to/nzxt-h510.png',
                 // NZXT
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 8, // Portátiles Gaming
                'name' => 'Lenovo Legion 5',
                'description' => 'Portátil gaming de 15.6" con RTX 3060 y teclado retroiluminado.',
                'stock' => 6,
                'price' => 1299.99,
                'color' => 'Negro',
                'image_path' => 'path/to/lenovo-legion-5.png',
                 // Lenovo
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 9, // Ultrabooks
                'name' => 'Microsoft Surface Laptop 4',
                'description' => 'Ultrabook elegante con pantalla táctil y gran duración de batería.',
                'stock' => 4,
                'price' => 1399.99,
                'color' => 'Plata',
                'image_path' => 'path/to/surface-laptop-4.png',
                 // Microsoft
            ],
            [
                'idBrand' => 6,
                'idSubCategory' => 10, // Ratones
                'name' => 'Logitech MX Master 3',
                'description' => 'Ratón ergonómico para productividad con múltiples dispositivos.',
                'stock' => 30,
                'price' => 99.99,
                'color' => 'Negro',
                'image_path' => 'path/to/logitech-mx-master-3.png',
                 // Logitech
            ],
            [
                'idBrand' => 10,
                'idSubCategory' => 11, // Teclados
                'name' => 'Keychron K6',
                'description' => 'Teclado mecánico compacto, compatible con múltiples dispositivos.',
                'stock' => 20,
                'price' => 79.99,
                'color' => 'Negro',
                'image_path' => 'path/to/keychron-k6.png',
                 // Keychron
            ],
            [
                'idBrand' => 4,
                'idSubCategory' => 13, // Impresoras
                'name' => 'Brother MFC-L3770CDW',
                'description' => 'Impresora láser multifuncional color con conectividad inalámbrica.',
                'stock' => 8,
                'price' => 399.99,
                'color' => 'Negro',
                'image_path' => 'path/to/brother-mfc-l3770cdw.png',
                 // Brother
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 14, // Monitores Gaming
                'name' => 'Acer Nitro VG271',
                'description' => 'Monitor gaming IPS Full HD de 27" con tasa de refresco de 75Hz.',
                'stock' => 10,
                'price' => 299.99,
                'color' => 'Negro',
                'image_path' => 'path/to/acer-nitro-vg271.png',
                 // Acer
            ],
            [
                'idBrand' => 5,
                'idSubCategory' => 15, // Monitores Profesionales
                'name' => 'Dell UltraSharp U2720Q',
                'description' => 'Monitor 4K de 27" con alta precisión de color para profesionales.',
                'stock' => 5,
                'price' => 799.99,
                'color' => 'Negro',
                'image_path' => 'path/to/dell-ultrasharp-u2720q.png',
                 // Dell
            ],
        ];

        DB::table('productes')->insert($products);
    }
}
