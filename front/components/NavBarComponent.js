import { defineComponent, defineAsyncComponent, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";


export const NavBarComponent = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/navBar/navBarComponent.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'NavBarComponent',
            props: {
                productsCart: {
                    type: Array,
                    default: () => [] // Cambiar a función para asegurar el valor predeterminado
                }
            },
            emits: ['updatePage'],
            setup(props, { emit }) {

                const categoryMenu = ref(false);
                const categoryCarrito = ref(false);


                const goToRegister = () => {
                    emit('updatePage', 'register');
                };

                const goToHome = () => {
                    emit('updatePage', 'home');
                };

                const goToCart = () => {
                    categoryCarrito.value = false
                    emit('updatePage', 'cart');
                };


                return {
                    goToRegister,
                    goToCart,
                    goToHome,
                    categoryMenu,
                    categoryCarrito,
                    productsCart: props.productsCart
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)