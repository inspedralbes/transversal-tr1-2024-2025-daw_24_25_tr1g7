import { defineComponent, defineAsyncComponent, ref, onMounted, computed, reactive } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";

import {AddPaymentMethodComponent} from "./AddPaymentMethodComponent.js";
import {purchase} from "../communicationManager/communicationManager.js";
import {ToastNotificationComponent} from "./ToastNotificationComponent.js";

export const CartPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/cart/cartPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'CartPage',
            components:{
                AddPaymentMethodComponent,
                ToastNotificationComponent
            },
            props: {
                productsCart: {
                    type: Array,
                    default: () => [] // Cambiar a función para asegurar el valor predeterminado
                }
            },
            emits: ['updatePage', 'finish', 'deleteProductCart'],
            setup(props, { emit }) {

                onMounted(async () => {
                    if(localStorage.getItem('user') === null){
                        console.log("Tienes que registrarte")
                        localStorage.setItem('buyProducts', 'cart');
                        emit('updatePage', 'login');
                    }
                });
                const getToken = () =>{
                    return localStorage.getItem('token');
                }

                //toast message
                const toastMessage = ref('');
                const toastType = ref('');
                const showToast = ref(false);

                const showToastMessage = (message, type = 'info') => {
                    toastMessage.value = message;
                    toastType.value = type;
                    showToast.value = true;
                };

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

                const selectPaymentMethod = async (paymentMethod) =>{
                    // console.log(paymentMethodId)
                    // let response = await comm.setDefaultPaymentMethod(localStorage.getItem('token'), paymentMethodId);
                    // paymentMethods.data = response.paymentMethods;
                    defaultPaymentMethods.data = paymentMethod;
                    // console.log(response)
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
                        steps.value = 'selectAddress';
                        toggleLoading();

                        shippingAddresses.data = await comm.getShippingAddresses(getToken());
                        Object.assign(shippingAddresses.data.find(address => address.default) || {}, { selected: true });                        console.log(shippingAddresses);
                        billingAddressess.data = await comm.getBillingAddresses(getToken());
                        Object.assign(billingAddressess.data.find(address => address.default) || {}, { selected: true });                        console.log(shippingAddresses);
                        console.log(billingAddressess);
                        toggleLoading();

                    }
                }

                //INIT SHIPPING AND BILLING ADDRES
                const user = localStorage.getItem('user');
                const userId = user ? JSON.parse(user).id : null;

                const formDataShippingAdress = reactive({
                    'index': null,
                    'id': null,
                    'idUser': userId,
                    'zip_code': null,
                    'population': '',
                    'city': '',
                    'street':'',
                    'number':'',
                    'floor':'',
                    'door':''
                });
                const formDataBillingAdress = reactive({
                    'index': null,
                    'id': null,
                    'idUser': userId,
                    'invoiceId':null,
                    'name':'',
                    'lastName':'',
                    'companyName':'',
                    'phoneNumber':null,
                    'dniNie':'',
                    'cif':'',
                    'zip_code': null,
                    'population': '',
                    'city': '',
                    'street':'',
                    'number':'',
                    'floor':'',
                    'door':''
                });
                const showModalAddShippingAddress = ref(false)
                const showModalAddBillingAddress = ref(false)
                const typeModal = ref('')
                const typeModalBilling = ref('')

                const selectedType = ref('particular');
                const shippingAddresses = reactive({data:[]});
                const billingAddressess = reactive({data:[]});

                const createShippingAddress = async () => {
                    try {
                        let response = await comm.createShippingAddress(getToken(), formDataShippingAdress);
                        console.log(response);
                        if (response && response.data) {
                            shippingAddresses.data.push(response.data);
                            showModalAddShippingAddress.value = false; // Close modal after success
                            Object.assign(shippingAddresses.data.find(address => address.default) || {}, { selected: true });                        console.log(shippingAddresses);

                        }
                    } catch (error) {
                        console.error('Error creating shipping address:', error);
                    }
                }

                const deleteShippingAddress = async (shippingAddress, index) => {
                    try {
                        const response = await comm.deleteShippingAddress(getToken(), shippingAddress.id);
                        console.log(response);
                        if (response.status === 'success') { // Assuming your API returns a status
                            shippingAddresses.data.splice(index, 1);
                        }
                    } catch (error) {
                        console.error('Error deleting shipping address:', error);
                        showToastMessage('Esta dirección esta relacionada a un pedido', 'error')

                    }
                }

                const showOpenEditShippingAddress = (shippingAddress, index) =>{
                    console.log(shippingAddress)

                    formDataShippingAdress.index = index;
                    formDataShippingAdress.id = shippingAddress.id;
                    formDataShippingAdress.zip_code = shippingAddress.zip_code;
                    formDataShippingAdress.population = shippingAddress.population;
                    formDataShippingAdress.city = shippingAddress.city;
                    formDataShippingAdress.street = shippingAddress.street;
                    formDataShippingAdress.number = shippingAddress.number;
                    formDataShippingAdress.floor = shippingAddress.floor;
                    formDataShippingAdress.door = shippingAddress.door;

                    showModalAddShippingAddress.value = !showModalAddShippingAddress.value;
                    typeModal.value = 'edit';
                }

                const showOpenAddShippingAddress = () => {
                    Object.keys(formDataShippingAdress).forEach(key => {
                        if (key === 'idUser') return;
                        formDataShippingAdress[key] = key === 'index' || key === 'id' || key === 'zip_code' ? null : '';
                    });

                    showModalAddShippingAddress.value = !showModalAddShippingAddress.value;
                    typeModal.value = 'store';
                }

                const updateShippingAddress = async() => {
                    try {
                        let response = await comm.updateShippingAddress(getToken(), formDataShippingAdress.id, formDataShippingAdress);
                        console.log(response);

                        if (response && response.data && response.status === 'success') {
                            shippingAddresses.data[formDataShippingAdress.index] = response.data;
                            showModalAddShippingAddress.value = false; // Cerrar modal
                        }
                    } catch (error) {
                        console.error('Error al actualizar la dirección:', error);
                        alert('Error al actualizar la dirección');
                    }
                };

                const selectShippingAddress = async(shippingAddress)=>{
                    // let response = await comm.updateDefaultShippingAddress(getToken(), shippingAddress);
                    // console.log(response);
                    // shippingAddresses.data = response.shippingAddressess;
                    Object.assign(shippingAddresses.data.find(address => address.selected) || {}, { selected: false });                        console.log(shippingAddresses);

                    shippingAddress.selected = true;

                }

                const createBillingAddress = async () => {
                    try {
                        let response = await comm.createBillingAddress(getToken(), formDataBillingAdress);
                        console.log(response);
                        if (response && response.data) {
                            billingAddressess.data.push(response.data);
                            showModalAddBillingAddress.value = false; // Close modal after success
                            Object.assign(billingAddressess.data.find(address => address.default) || {}, { selected: true });                        console.log(shippingAddresses);

                        }
                    } catch (error) {
                        console.error('Error creating shipping address:', error);
                    }
                }

                const deleteBillingAddress = async (billingAddress, index) => {
                    try {
                        const response = await comm.deleteBillingAddress(getToken(), billingAddress.id);
                        console.log(response);
                        if (response.status === 'success') { // Assuming your API returns a status
                            billingAddressess.data.splice(index, 1);
                        }
                    } catch (error) {
                        console.error('Error deleting shipping address:', error);
                        showToastMessage('Esta dirección esta relacionada a un pedido', 'error')
                    }
                }

                const showOpenEditBillingAddress = (billingAddress, index) =>{
                    console.log(billingAddress)

                    formDataBillingAdress.index = index;
                    formDataBillingAdress.id = billingAddress.id;
                    formDataBillingAdress.zip_code = billingAddress.zip_code;
                    formDataBillingAdress.population = billingAddress.population;
                    formDataBillingAdress.city = billingAddress.city;
                    formDataBillingAdress.street = billingAddress.street;
                    formDataBillingAdress.number = billingAddress.number;
                    formDataBillingAdress.floor = billingAddress.floor;
                    formDataBillingAdress.door = billingAddress.door;

                    showModalAddBillingAddress.value = !showModalAddBillingAddress.value;
                    typeModalBilling.value = 'edit';
                }

                const showOpenAddBillingAddress = () => {
                    Object.keys(formDataBillingAdress).forEach(key => {
                        if (key === 'idUser') return;
                        formDataBillingAdress[key] = key === 'index' || key === 'id' || key === 'zip_code' ? null : '';
                    });

                    showModalAddBillingAddress.value = !showModalAddBillingAddress.value;
                    typeModalBilling.value = 'store';
                }

                const updateBillingAddress = async() => {
                    try {
                        let response = await comm.updateBillingAddress(getToken(), formDataBillingAdress.id, formDataBillingAdress);
                        console.log(response);

                        if (response && response.data && response.status === 'success') {
                            billingAddressess.data[formDataBillingAdress.index] = response.data;
                            showModalAddBillingAddress.value = false; // Cerrar modal
                        }
                    } catch (error) {
                        console.error('Error al actualizar la dirección:', error);
                        alert('Error al actualizar la dirección');
                    }
                };

                const selectBillingAddress = async(billingAddress)=>{
                    // let response = await comm.updateDefaultBillingAddress(getToken(), billingAddress);
                    // console.log(response);
                    // billingAddressess.data = response.billingAddressess;

                    Object.assign(billingAddressess.data.find(address => address.selected) || {}, { selected: false });                        console.log(shippingAddresses);

                    billingAddress.selected = true;
                }

                const handleTypeChange = () => {
                    console.log('Tipo seleccionado:', selectedType.value);
                    // Aquí puedes hacer lo que necesites cuando cambie
                }
                //FINISH SHIPPING AND BILLING ADDRES


                const selectAddresses = async () =>{
                    const hasSelectedShipping = shippingAddresses.data.some(address => address.selected === true);
                    const hasSelectedBilling = billingAddressess.data.some(address => address.selected === true);

                    if (hasSelectedShipping && hasSelectedBilling) {
                        steps.value = 'selectCreditCard';
                        toggleLoading();

                        console.log("Puedes ver tus tarjetas de crédito");
                        console.log(JSON.parse(localStorage.getItem('user')));
                        console.log(localStorage.getItem('token'));

                        let response = await comm.retrievePaymentMethod(localStorage.getItem('token'));
                        paymentMethods.data = response.paymentMethods;
                        defaultPaymentMethods.data = response.defaultPaymentMethod;

                        console.log(paymentMethods.data);
                        console.log(defaultPaymentMethods.data);

                        toggleLoading();
                    } else {
                        console.log("Debe seleccionar una dirección de envío y una dirección de facturación.");
                        showToastMessage('Debes seleccionar las direcciones', 'error')
                    }

                }


                const finishBuying = async() => {
                    // steps.value = 'finishBuy'
                    const shippingAddresSelected = shippingAddresses.data.find(address => address.selected);
                    const billingAddressSelected = billingAddressess.data.find(address => address.selected);
                    toggleLoading();

                    let response = await comm.purchase(getToken(), defaultPaymentMethods.data, parseFloat(priceTotal.value), props.productsCart, shippingAddresSelected, billingAddressSelected);
                    console.log(response);

                    if(response.status === 'success'){
                        toggleLoading();

                        emit('finish', true);
                        steps.value='finishBuy';
                        // emit('updatePage', 'home');
                        // localStorage.removeItem('productsCart')

                    }
                }

                const goToHome = ()=>{
                    emit('updatePage', 'home');

                }
                const goToRegister = () => {
                    emit('updatePage', 'register');
                };

                const showLoadingPage = ref(false);
                function toggleLoading() {
                    showLoadingPage.value = !showLoadingPage.value;
                }


                const handleDefaultPaymentMethod = (data)=> {
                    paymentMethods.data = data;
                    showAddCreditCardComponent.value = false;

                }

                const deleteProduct = (product) =>{
                    emit('deleteProductCart', product);
                }

                const plusProduct = (product) =>{
                    product.num_product++;
                }

                const substractProduct = (product) =>{
                    product.num_product--;
                    if(product.num_product == 0){
                        emit('deleteProductCart', product);

                    }
                }

                return {
                    toastMessage,
                    toastType,
                    showToast,

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
                    finishBuying,


                    createShippingAddress,
                    deleteShippingAddress,
                    showOpenEditShippingAddress,
                    showOpenAddShippingAddress,
                    updateShippingAddress,
                    selectShippingAddress,
                    createBillingAddress,
                    deleteBillingAddress,
                    showOpenEditBillingAddress,
                    showOpenAddBillingAddress,
                    updateBillingAddress,
                    selectBillingAddress,
                    formDataShippingAdress,
                    formDataBillingAdress,
                    showModalAddShippingAddress,
                    showModalAddBillingAddress,
                    shippingAddresses,
                    billingAddressess,
                    typeModal,
                    typeModalBilling,
                    selectedType,
                    handleTypeChange,

                    selectAddresses,
                    showLoadingPage,
                    handleDefaultPaymentMethod,

                    deleteProduct,
                    substractProduct,
                    plusProduct,

                    goToHome
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
)