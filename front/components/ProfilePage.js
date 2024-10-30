import { defineComponent, defineAsyncComponent, reactive, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js";
import {
    createShippingAddress,
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
                })
                const tab = ref('myData');
                const showModalAddShippingAddress = ref(false)
                const typeModal = ref('')
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

                const shippingAddresses = reactive({data:[]})
                onMounted(async () => {
                    shippingAddresses.data = await comm.getShippingAddresses(getToken());
                    console.log(shippingAddresses)

                    let response = await comm.retrievePaymentMethod(getToken());
                    paymentMethods.data = response.paymentMethods;
                    defaultPaymentMethods.data = response.defaultPaymentMethod;
                    console.log(paymentMethods.data)
                    console.log(defaultPaymentMethods.data)

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

                const updateDefault = async(shippingAddress)=>{
                    let response = await comm.updateDefaultShippingAddress(getToken(), shippingAddress);
                    console.log(response);
                    shippingAddresses.data = response.shippingAddressess;
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
                return {
                    tab,
                    logout,
                    createShippingAddress,
                    deleteShippingAddress,
                    showOpenEditShippingAddress,
                    showOpenAddShippingAddress,
                    updateShippingAddress,
                    updateDefault,
                    formDataShippingAdress,
                    showModalAddShippingAddress,
                    shippingAddresses,
                    typeModal,
                    paymentMethods,
                    defaultPaymentMethods,
                    selectPaymentMethod,
                    showAddCreditCardComponent,
                    handleDefaultPaymentMethod
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
