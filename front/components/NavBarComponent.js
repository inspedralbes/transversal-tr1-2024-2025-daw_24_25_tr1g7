import { defineComponent, defineAsyncComponent, ref, onMounted, reactive } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
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

                const userData = ref(JSON.parse(localStorage.getItem('user') || '{}'));
                const isLogin = ref(!!localStorage.getItem('user'));
                const menuCategories = reactive({data:[]});

                const categoryMenu = ref(false);
                const categoryCarrito = ref(false);
                const profileMenu = ref(false);

                const goToRegister = () => {
                    emit('updatePage', 'register');
                };

                const goToHome = () => {
                    emit('updatePage', 'home');
                };

                const goToLogin = () => {
                    emit('updatePage', 'login');
                };

                const goToCart = () => {
                    categoryCarrito.value = false
                    emit('updatePage', 'cart');
                };

                onMounted(async () => {
                    menuCategories.data = await comm.getMenuCategories();
                });

                return {
                    goToRegister,
                    goToCart,
                    goToHome,
                    goToLogin,
                    categoryMenu,
                    categoryCarrito,
                    profileMenu,
                    productsCart: props.productsCart,
                    isLogin,
                    userData,
                    menuCategories
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)