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
            emits: ['updatePage', 'profilePageTab'],
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
                const goToProfilePage = (type) => {
                    console.log(type)
                    emit('updatePage', 'profile');
                    emit('profilePageTab', type);
                    profileMenu.value = false;
                };

                const logout = async() => {
                    let response = await comm.logout();
                    console.log(response)
                    if(response.status === 'success'){
                        localStorage.removeItem('user');
                        localStorage.removeItem('token');
                        emit('updatePage', 'home');
                        profileMenu.value = false;
                    }

                }

                const goToFilter = (filterName) => {
                    emit('updatePage', 'filtro');
                }

                onMounted(async () => {
                    menuCategories.data = await comm.getMenuCategories();
                });

                return {
                    goToRegister,
                    goToCart,
                    goToHome,
                    goToLogin,
                    goToProfilePage,
                    goToFilter,
                    categoryMenu,
                    categoryCarrito,
                    profileMenu,
                    productsCart: props.productsCart,
                    isLogin,
                    userData,
                    menuCategories,

                    logout
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)