import { defineComponent, defineAsyncComponent, ref, reactive, computed } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from '../communicationManager/communicationManager.js'
import {ToastNotificationComponent} from "./ToastNotificationComponent.js";

export const RegisterPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/authenticate/registerPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'RegisterPage',
            props: {
                page: {
                    type: String,
                    default: "register"
                }
            },
            components:{
                ToastNotificationComponent
            },
            emits: ['updatePage'],
            setup(props, { emit }) {
                const formData = reactive({
                    username: '',
                    email: '',
                    password: '',
                    passwordRepeat: ''
                });

                const errors = reactive({
                    username: '',
                    email: '',
                    password: '',
                    passwordRepeat: ''
                });

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

                const validateUsername = () => {
                    errors.username = formData.username.length < 3 ? 'Username must be at least 3 characters long' : '';
                };

                const validateEmail = () => {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    errors.email = !emailRegex.test(formData.email) ? 'Please enter a valid email address' : '';
                };

                const validatePassword = () => {
                    errors.password = formData.password.length < 4 ? 'Password must be at least 4 characters long' : '';
                };

                const validatePasswordRepeat = () => {
                    errors.passwordRepeat = formData.password !== formData.passwordRepeat ? 'Passwords do not match' : '';
                };

                const isFormValid = computed(() => {
                    return formData.username.length >= 3 &&
                        /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email) &&
                        formData.password.length >= 4 &&
                        formData.password === formData.passwordRepeat;
                });

                const goToLogin = () => {
                    emit('updatePage', 'login');
                };

                const goToHome = () => {
                    emit('updatePage', 'home');
                };

                const register = async () => {
                    validateUsername();
                    validateEmail();
                    validatePassword();
                    validatePasswordRepeat();

                    if (isFormValid.value) {
                        toggleLoading();
                        console.log('Form Data:', formData);
                        console.log('correcto');
                        let result = await comm.insertUser(formData);
                        toggleLoading();

                        console.log(result);
                        if(result.status === 'success'){
                            showToastMessage('Bienvenido a NetCore', 'success')
                            localStorage.setItem('user', JSON.stringify(result.user));
                            localStorage.setItem('token', result.token);
                            goToHome();
                        }
                        else{
                            console.log("error")
                            showToastMessage('Ha ocurrido algo inesperado', 'error')

                        }
                        // localStorage.setItem('user', JSON.stringify(result.user));
                        // localStorage.setItem('token', result.token);
                        // Aquí puedes añadir la lógica para enviar los datos al servidor
                    } else {
                        console.log('Please correct the errors in the form');
                        showToastMessage('Ha ocurrido algo inesperado', 'error')

                    }
                };

                return {
                    toastMessage,
                    toastType,
                    showToast,

                    showLoadingPage,

                    formData,
                    errors,
                    goToLogin,
                    register,
                    validateUsername,
                    validateEmail,
                    validatePassword,
                    validatePasswordRepeat,
                    isFormValid
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)