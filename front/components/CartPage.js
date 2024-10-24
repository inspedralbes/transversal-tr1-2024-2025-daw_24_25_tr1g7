import { defineComponent, defineAsyncComponent, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";


export const CartPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/cart/cartPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'CartPage',
            props: {
                productsCart: {
                    type: Array,
                    default: () => [] // Cambiar a función para asegurar el valor predeterminado
                }
            },
            emits: ['updatePage'],
            setup(props, { emit }) {

                const goToRegister = () => {
                    emit('updatePage', 'register');
                };

                return {
                    goToRegister,
                    productsCart: props.productsCart
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)