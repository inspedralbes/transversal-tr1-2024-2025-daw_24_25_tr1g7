import { defineComponent, defineAsyncComponent, ref, onMounted, computed, reactive } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";

import {AddPaymentMethodComponent} from "./AddPaymentMethodComponent.js";

export const CartPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/cart/cartPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'CartPage',
            components:{
                AddPaymentMethodComponent
            },
            props: {
                productsCart: {
                    type: Array,
                    default: () => [] // Cambiar a función para asegurar el valor predeterminado
                }
            },
            emits: ['updatePage'],
            setup(props, { emit }) {
                const showAddCreditCardComponent = ref(false);
                const paymentMethods = reactive({data: []})
                const defaultPaymentMethods = reactive({data: []})
                const steps = ref('summaryTotal');

                const priceTotal = computed(() => {
                    return props.productsCart.reduce((total, product) =>
                        total + (product.price * product.num_product), 0
                    ).toFixed(2);
                });

                const priceTotalWithIVA = computed(() => {
                    const basePrice = parseFloat(priceTotal.value);
                    return (basePrice + (basePrice * 0.21)).toFixed(2);
                });

                const selectPaymentMethod = async (paymentMethodId) =>{
                    console.log(paymentMethodId)
                    let response = await comm.setDefaultPaymentMethod(localStorage.getItem('token'), paymentMethodId);
                    paymentMethods.data = response.paymentMethods;
                    defaultPaymentMethods.data = response.defaultPaymentMethod;
                    console.log(response)
                }

                const deletePaymentMethod = (paymentMethodId) => {
                    // Lógica para borrar el método de pago
                };

                const buyProducts = async() =>{
                    if(localStorage.getItem('user') === null){
                        console.log("Tienes que registrarte")
                        localStorage.setItem('buyProducts', 'cart');
                        emit('updatePage', 'login');
                    }else{
                        steps.value = 'selectCreditCard'
                        console.log("Puedes ver tus tarjetas de credito");
                        console.log(JSON.parse(localStorage.getItem('user')));
                        console.log(localStorage.getItem('token'));
                        let response = await comm.retrievePaymentMethod(localStorage.getItem('token'));
                        paymentMethods.data = response.paymentMethods;
                        defaultPaymentMethods.data = response.defaultPaymentMethod;
                        console.log(paymentMethods.data)
                        console.log(defaultPaymentMethods.data)
                    }
                }

                const finishBuying = () => {
                    steps.value = 'finishBuy'
                }
                const goToRegister = () => {
                    emit('updatePage', 'register');
                };

                return {
                    goToRegister,
                    productsCart: props.productsCart,
                    priceTotal,
                    buyProducts,
                    steps,
                    priceTotalWithIVA,
                    paymentMethods,
                    defaultPaymentMethods,
                    showAddCreditCardComponent,
                    selectPaymentMethod,
                    finishBuying
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)