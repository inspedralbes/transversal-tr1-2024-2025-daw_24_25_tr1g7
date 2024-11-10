import { defineComponent, defineAsyncComponent, reactive, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js";
import {getHomeData} from "../communicationManager/communicationManager.js";

export const HomePage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/home/homePage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'HomePage',
            emits: ['addProductToCart', 'showProduct', 'updatePage'],
            setup(props, { emit }) {
                const productes = reactive({ data: [] });

                onMounted(async () => {
                    toggleLoading();
                    productes.data = await comm.getHomeData();
                    toggleLoading();
                });

                const showLoadingPage = ref(false);

                function toggleLoading() {
                    showLoadingPage.value = !showLoadingPage.value;
                }

                const showToProduct = (producte) => {
                    console.log("Producto seleccionado:", producte);
                    emit('showProduct', producte);
                };

                const addToCart = (producte) => {
                    console.log("Añadido al carrito:", producte);
                    emit('addProductToCart', producte);
                };

                const goToFilter = (filterName) => {
                    emit('updatePage', 'filtro');
                }

                return {
                    productes,
                    addToCart, // Asegúrate de retornar ambas funciones
                    showToProduct,
                    goToFilter,

                    showLoadingPage,
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
