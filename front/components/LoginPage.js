import { defineComponent, defineAsyncComponent, reactive, computed,ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";
import {ToastNotificationComponent} from "./ToastNotificationComponent.js";

export const LoginPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/authenticate/loginPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'LoginPage',
            props: {
                page: {
                    type: String,
                    default: "login"
                }
            },
            components:{
                ToastNotificationComponent
            },
            emits: ['updatePage'],
            setup(props, { emit }) {
                const goToRegister = () => {
                    emit('updatePage', 'register');
                };

                const showLoadingPage = ref(false);
                function toggleLoading() {
                    showLoadingPage.value = !showLoadingPage.value;
                }


                const toastMessage = ref('');
                const toastType = ref('');
                const showToast = ref(false);

                const showToastMessage = (message, type = 'info') => {
                    toastMessage.value = message;
                    toastType.value = type;
                    showToast.value = true;
                };

                const formData = reactive({
                    email: '',
                    password: '',
                });

                const errors = reactive({
                    email: '',
                    password: '',
                });

                const validateEmail = () => {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    errors.email = !emailRegex.test(formData.email) ? 'Please enter a valid email address' : '';
                };

                const validatePassword = () => {
                    errors.password = formData.password.length < 0 ? 'Password must be at least 4 characters long' : '';
                };

                const isFormValid = computed(() => {
                    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email) &&
                        formData.password.length >= 1 ;
                })

                const login = async () => {
                    validateEmail();
                    validatePassword();

                    if (isFormValid.value) {
                        toggleLoading();
                        console.log('Form Data:', formData);
                        console.log('correcto');
                        let result = await comm.authenticate(formData);
                        toggleLoading();

                        console.log(result);
                        if(result.status === 'success'){
                            showToastMessage('Bienvenido a NetCore', 'success')
                            localStorage.setItem('user', JSON.stringify(result.user));
                            localStorage.setItem('token', result.token);
                            let actualPage = '';
                            if(localStorage.getItem('buyProducts')){
                                actualPage = 'cart';
                            }else{
                                actualPage = 'home';
                            }
                            emit('updatePage', actualPage)
                        }else{
                            showToastMessage('Credenciales incorrectas', 'error')

                        }
                        // Aquí puedes añadir la lógica para enviar los datos al servidor
                    } else {
                        console.log('Please correct the errors in the form');
                        showToastMessage('Credenciales incorrectas', 'error')
                    }
                };

                return {
                    toastMessage,
                    toastType,
                    showToast,
                    showLoadingPage,

                    formData,
                    errors,
                    goToRegister,
                    login,
                    validateEmail,
                    validatePassword,
                    isFormValid
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)