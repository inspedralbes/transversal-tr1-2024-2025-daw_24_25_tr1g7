import { defineComponent, defineAsyncComponent, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";

// Import Stripe.js
import 'https://js.stripe.com/v3/';

export const NavBarComponent = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/navBar/NavBarComponent.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'AddPaymentMethodComponent',
            emits: ['updatePage'],
            setup(props, { emit }) {

                const categoryMenu = ref(false);
                const categoryCarrito = ref(false);

                console.log(categoryCarrito)
                onMounted(() => {
                });

                const goToRegister = () => {
                    emit('updatePage', 'register');
                };


                return {
                    goToRegister,
                    categoryMenu,
                    categoryCarrito
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)