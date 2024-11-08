import { defineComponent, defineAsyncComponent, reactive, ref, onMounted, computed } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js";
import {
    createShippingAddress, downloadInvoice, getMyOrders,
    updateDefaultShippingAddress,
    updateShippingAddress
} from "../communicationManager/communicationManager.js";
import {AddPaymentMethodComponent} from "./AddPaymentMethodComponent.js";

export const ProfilePage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/profile/profilePage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'ProfilePage',
            components:{
                AddPaymentMethodComponent
            },
            emits: ['updatePage'],
            setup(props, { emit }) {

                const getToken = () =>{
                    return localStorage.getItem('token');
                }

                const paymentMethods = reactive({data: []})
                const defaultPaymentMethods = reactive({data: []})
                const showAddCreditCardComponent = ref(false);

                const formDataShippingAdress = reactive({
                    'index': null,
                    'id': null,
                    'idUser': JSON.parse(localStorage.getItem('user')).id,
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
                    'idUser': JSON.parse(localStorage.getItem('user')).id,
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
                const tab = ref('myData');
                const showModalAddShippingAddress = ref(false)
                const showModalAddBillingAddress = ref(false)
                const typeModal = ref('')
                const typeModalBilling = ref('')

                const selectedType = ref('particular');

                const logout = async() => {
                    let response = await comm.logout();
                    console.log(response)
                    if(response.status === 'success'){
                        localStorage.removeItem('user');
                        localStorage.removeItem('token');
                        emit('updatePage', 'home');
                    }

                }
                const goToHome = () => {
                    emit('updatePage', 'home');
                };

                const shippingAddresses = reactive({data:[]});
                const billingAddressess = reactive({data:[]});


                onMounted(async () => {
                    toggleLoading();

                    shippingAddresses.data = await comm.getShippingAddresses(getToken());
                    // console.log(shippingAddresses);
                    billingAddressess.data = await comm.getBillingAddresses(getToken());
                    // console.log(billingAddressess);

                    let responseOrders = await comm.getMyOrders(getToken());
                    console.log(responseOrders)
                    responseOrders.forEach((order)=>{
                        order.details = false;
                    })
                    orders.data = responseOrders;
                    console.log(orders.data);

                    invoices.data = await comm.getMyInvoices(getToken());
                    console.log(invoices.data);

                    let response = await comm.retrievePaymentMethod(getToken());
                    paymentMethods.data = response.paymentMethods;
                    defaultPaymentMethods.data = response.defaultPaymentMethod;
                    // console.log(paymentMethods.data)
                    // console.log(defaultPaymentMethods.data)

                    let testauth = await comm.testAuth(getToken());
                    // console.log("testAuth")
                    // console.log(testauth)
                    toggleLoading();


                });

                const createShippingAddress = async () => {
                    try {
                        let response = await comm.createShippingAddress(getToken(), formDataShippingAdress);
                        console.log(response);
                        if (response && response.data) {
                            shippingAddresses.data.push(response.data);
                            showModalAddShippingAddress.value = false; // Close modal after success
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

                const updateDefaultShippingAddress = async(shippingAddress)=>{
                    let response = await comm.updateDefaultShippingAddress(getToken(), shippingAddress);
                    console.log(response);
                    shippingAddresses.data = response.shippingAddressess;
                }

                const createBillingAddress = async () => {
                    try {
                        let response = await comm.createBillingAddress(getToken(), formDataBillingAdress);
                        console.log(response);
                        if (response && response.data) {
                            billingAddressess.data.push(response.data);
                            showModalAddBillingAddress.value = false; // Close modal after success
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

                const updateDefaultBillingAddress = async(billingAddress)=>{
                    let response = await comm.updateDefaultBillingAddress(getToken(), billingAddress);
                    console.log(response);
                    billingAddressess.data = response.billingAddressess;
                }



                const selectPaymentMethod = async (paymentMethodId) =>{
                    console.log(paymentMethodId)
                    let response = await comm.setDefaultPaymentMethod(localStorage.getItem('token'), paymentMethodId);
                    paymentMethods.data = response.paymentMethods;
                    defaultPaymentMethods.data = response.defaultPaymentMethod;
                    console.log(response)
                }

                const handleDefaultPaymentMethod = (data)=> {
                    paymentMethods.data = data;
                    showAddCreditCardComponent.value = false; // Cierra el modal
                }


                const handleTypeChange = () => {
                    console.log('Tipo seleccionado:', selectedType.value);
                    // Aquí puedes hacer lo que necesites cuando cambie
                }


                //MYORDERS
                const orders = reactive({data:[]});
                const formDataOrder = reactive({
                    'shippingAddress': '',
                    'billingAddress': '',
                    'total': null
                });
                const seeDetails = (order) =>{
                    order.details = true;
                }
                const hideDetails = (order)=>{
                    order.details = false;
                }
                const formatDate = (dateString) => {
                    const date = new Date(dateString);
                    return date.toLocaleDateString('es-ES'); // Esto mostrará el formato dd/mm/yyyy
                }
                const statusFormater = (status) => {
                    const statusMap = {
                        pending: "Pendent",
                        in_progress: "Enviat",
                        complete: "Entregat",
                        cancelled: "Cancelado"
                    };

                    return statusMap[status] || status; // Retorna el estado traducido o el original si no hay coincidencia
                };
                const lookDetailOrder = (order)=>{
                    showModalDetailsOrder.value = !showModalDetailsOrder.value;
                    console.log(order)
                    formDataOrder.shippingAddress = order.shipping_address;
                    formDataOrder.billingAddress = order.billing_address;
                    formDataOrder.total = order.price;
                    console.log(formDataOrder)
                }
                // Formateador de fecha
                const formatDateExtends = (dateString) => {
                    const date = new Date(dateString);
                    const day = date.getDate();
                    const monthNames = [
                        "enero", "febrero", "marzo", "abril", "mayo", "junio",
                        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
                    ];
                    const month = monthNames[date.getMonth()];
                    const year = date.getFullYear();

                    return `desde el ${day} de ${month} de ${year}`;
                };
                const showModalDetailsOrder = ref(false);


                //INVOICES
                const invoices = reactive({data:[]});

                const downloadInvoice = async(invoice)=>{
                    toggleLoading();
                    let data = await comm.downloadInvoice(getToken(), invoice.idOrder);
                    console.log(data);
                    if (data.status === 'success') {
                        // Convertir base64 a Blob
                        const binaryString = window.atob(data.content);
                        const bytes = new Uint8Array(binaryString.length);

                        for (let i = 0; i < binaryString.length; i++) {
                            bytes[i] = binaryString.charCodeAt(i);
                        }

                        const blob = new Blob([bytes.buffer], { type: 'application/pdf' });

                        // Crear URL temporal para la descarga
                        const url = window.URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.href = url;
                        link.download = `factura_${invoice.idOrder}.pdf`;

                        // Simular click para descargar
                        document.body.appendChild(link);
                        link.click();

                        // Limpiar
                        document.body.removeChild(link);
                        window.URL.revokeObjectURL(url);
                    } else {
                        console.error('Error al descargar la factura');
                    }
                    toggleLoading();

                }

                const showLoadingPage = ref(false);

                function toggleLoading() {
                    showLoadingPage.value = !showLoadingPage.value;
                }


                return {
                    tab,
                    logout,
                    createShippingAddress,
                    deleteShippingAddress,
                    showOpenEditShippingAddress,
                    showOpenAddShippingAddress,
                    updateShippingAddress,
                    updateDefaultShippingAddress,
                    createBillingAddress,
                    deleteBillingAddress,
                    showOpenEditBillingAddress,
                    showOpenAddBillingAddress,
                    updateBillingAddress,
                    updateDefaultBillingAddress,
                    formDataShippingAdress,
                    formDataBillingAdress,
                    showModalAddShippingAddress,
                    showModalAddBillingAddress,
                    shippingAddresses,
                    billingAddressess,
                    typeModal,
                    typeModalBilling,
                    paymentMethods,
                    defaultPaymentMethods,
                    selectPaymentMethod,
                    showAddCreditCardComponent,
                    handleDefaultPaymentMethod,
                    selectedType,
                    handleTypeChange,

                    orders,
                    seeDetails,
                    hideDetails,
                    formatDate,
                    statusFormater,
                    formatDateExtends,
                    showModalDetailsOrder,
                    formDataOrder,
                    lookDetailOrder,

                    invoices,
                    downloadInvoice,

                    showLoadingPage
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
