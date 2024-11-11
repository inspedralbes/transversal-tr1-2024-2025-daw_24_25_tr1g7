import { defineComponent, defineAsyncComponent, reactive, computed, onMounted, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js";

export const FiltrosPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/home/FiltrosPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'FiltrosPage',

            emits: ['updatePage', 'addProductToCart','showProduct'],
            setup(props, { emit }) {
                const goToRegister = () => {
                    emit('updatePage', 'register');
                };

                const showLoadingPage = ref(false);

                function toggleLoading() {
                    showLoadingPage.value = !showLoadingPage.value;
                }

                const products = reactive({ data: [] });
                const searchQuery = reactive({ text: '' });
                const price = reactive({ value: 500 });
                const filters = reactive({
                    popular: {
                        MSI: false,
                        Razer: false,
                        Micrófonos: false,
                        Auriculares: false,
                    },
                    categories: {
                        Componentes: false,
                        Portátiles: false,
                        Periféricos: false,
                        Monitores: false,
                        Impresoras: false,
                    },
                    brands: {
                        HP: false,
                        Samsung: false,
                        Apple: false,
                        Seagate: false,
                        AMD: false,
                        Dell: false,
                        NVIDIA: false,
                        Corsair: false,
                        Kingston: false,
                        Logitech: false,
                        Razer: false,
                        Intel: false,
                        MSI: false,
                        Asus: false,
                        EVGA: false,
                        CoolerMaster: false,
                        NZXT: false,
                        SteelSeries: false,
                        Acer: false,
                        LG: false,
                        Gigabyte: false,
                        GSkill: false,
                        Noctua: false,
                        FractalDesign: false,
                        Epson: false,
                        BenQ: false,
                        Lenovo: false,
                        Brother: false,
                        Sapphire: false,
                        Thermaltake: false,
                        BeQuiet: false,
                        Phanteks: false,
                        Canon: false,
                        ASRock: false,
                        Seasonic: false,
                        Microsoft: false,
                        Keychron: false,
                    },
                    entrega: {
                        EnvioGratis: false,
                        RecibeloMañana: false,
                    },
                    valoracion: {
                        fourStars: false,
                        allRatings: false,
                    }
                });

                const filteredProducts = computed(() => {
                    toggleLoading();
                    let result = products.data;

                    // Filtro de búsqueda
                    if (searchQuery.text.trim()) {
                        const query = searchQuery.text.toLowerCase();
                        result = result.filter(
                            product =>
                                product.name.toLowerCase().includes(query) ||
                                (product.description && product.description.toLowerCase().includes(query))
                        );
                    }

                    // Filtro de precio
                    result = result.filter(product => product.price <= price.value);

                    // Filtro popular
                    const popularFilters = Object.keys(filters.popular).filter(key => filters.popular[key]);
                    if (popularFilters.length) {
                        result = result.filter(product =>
                            popularFilters.some(filter => 
                                product.sub_category.category.name.toLowerCase().includes(filter.toLowerCase()) || 
                                product.sub_category.name.toLowerCase().includes(filter.toLowerCase())
                            )
                        );
                    }

                    // Filtro de categorías
                    const categoriesFilters = Object.keys(filters.categories).filter(key => filters.categories[key]);
                    if (categoriesFilters.length) {
                        result = result.filter(product => 
                            categoriesFilters.some(filter => 
                                product.sub_category.category.name.toLowerCase().includes(filter.toLowerCase()) ||
                                product.sub_category.name.toLowerCase().includes(filter.toLowerCase())
                            )
                        );
                    }

                    // Filtro de marcas
                    const brandsFilters = Object.keys(filters.brands).filter(key => filters.brands[key]);
                    if (brandsFilters.length) {
                        result = result.filter(product => 
                            brandsFilters.some(filter => 
                                product.brand.name.toLowerCase().includes(filter.toLowerCase())
                            )
                        );
                    }

                    // Filtro de valoración
                    if (filters.valoracion.fourStars) {
                        result = result.filter(product => product.valoracion >= 4); 
                    }
                    toggleLoading();
                    return result;
                });

                const addToCart = (producte) => {
                    toggleLoading();
                    console.log("Añadido al carrito:", producte);
                    emit('addProductToCart', producte);
                    toggleLoading();
                };

                const showToProduct = (producte) => {
                    console.log("Producto seleccionado:", producte);
                    emit('showProduct', producte);
                };

                const filterModal = ref(false);

                const openModalFiltros = () =>{
                    filterModal.value = true
                }
                onMounted(async() => {
                    toggleLoading();
                    let response = await comm.getProducts();
                    products.data = response;
                    toggleLoading();
                });

                return {
                    goToRegister,
                    products,
                    searchQuery,
                    price,
                    filteredProducts,
                    filters,
                    addToCart,
                    showToProduct,

                    showLoadingPage,

                    openModalFiltros,
                    filterModal
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
