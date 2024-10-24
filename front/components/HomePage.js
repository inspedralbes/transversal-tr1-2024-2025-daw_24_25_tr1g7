import { defineComponent, defineAsyncComponent, reactive, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js";
import {getHomeData} from "../communicationManager/communicationManager.js";

export const HomePage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/home/homePage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'HomePage',
            emits: ['addProductToCart', 'showProduct'],
            setup(props, { emit }) {
                const productes = reactive({ data: [] });

                onMounted(async () => {
                    productes.data = await comm.getHomeData();
                });

                const showToProduct = (producte) => {
                    console.log("Producto seleccionado:", producte);
                    emit('showProduct', producte);
                };

                const addToCart = (producte) => {
                    console.log("Añadido al carrito:", producte);
                    emit('addProductToCart', producte);
                };

                return {
                    productes,
                    addToCart, // Asegúrate de retornar ambas funciones
                    showToProduct
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
