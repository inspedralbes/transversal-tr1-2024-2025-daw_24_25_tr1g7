import { defineComponent, defineAsyncComponent, ref, onMounted, computed, reactive } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";
import {retrievePaymentMethod} from "../communicationManager/communicationManager.js";

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
                        paymentMethods.data = await retrievePaymentMethod(localStorage.getItem('token'));
                        console.log(paymentMethods.data)
                    }
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
                    paymentMethods
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)