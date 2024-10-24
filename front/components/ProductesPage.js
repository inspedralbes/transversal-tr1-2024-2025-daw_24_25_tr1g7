import { defineComponent, defineAsyncComponent, reactive } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';

export const ProductesPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/home/ProductesPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'ProductesPage',
            props: {
                productSelected: {
                    type: Object,
                    default: () => ({}) // Función que devuelve un objeto vacío por defecto
                }
            },
            emits: ['updatePage'],
            setup(props, { emit }) {

                const addToCart = (producte) => {
                    console.log("Añadido al carrito:", producte);
                    emit('addProductToCart', producte);
                };

                return {
                    product: props.productSelected,
                    addToCart
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
);
