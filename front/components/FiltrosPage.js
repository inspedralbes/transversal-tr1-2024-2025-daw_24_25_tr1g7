import { defineComponent, defineAsyncComponent, reactive, computed, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
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
                        Almacenamiento: false,
                        Accesorios: false,
                        Redes: false,
                        Smartphones: false,
                        Tablets: false,
                        Consolas: false,
                        Impresoras: false,
                        Software: false,
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

                    return result;
                });

                const addToCart = (producte) => {
                    console.log("Añadido al carrito:", producte);
                    emit('addProductToCart', producte);
                };

                const showToProduct = (producte) => {
                    console.log("Producto seleccionado:", producte);
                    emit('showProduct', producte);
                };

                onMounted(async() => {
                    let response = await comm.getProducts();
                    products.data = response;
                });

                return {
                    goToRegister,
                    products,
                    searchQuery,
                    price,
                    filteredProducts,
                    filters,
                    addToCart,
                    showToProduct
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
