import { defineComponent, defineAsyncComponent, reactive, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js";

export const FiltrosPage = defineAsyncComponent(() =>
   Promise.all([
       fetch('./templates/home/FiltrosPage.html').then(response => response.text()),
       Promise.resolve(defineComponent({
           name: 'FiltrosPage',

           emits: ['updatePage'],
           setup(props, { emit }) {
               const goToRegister = () => {
                   emit('updatePage', 'register');
               };

               const products = reactive({ data: [] });

               onMounted(async () => {
                try {
                    let response = await comm.getProducts();
                    console.log('Respuesta de la API:', response); 
                    products.data = response; 
                } catch (error) {
                    console.error('Error al obtener productos:', error);
                }
            });

               return {
                   goToRegister,
                   products
               };
           }
       }))
   ]).then(([template, component]) => {
       component.template = template;
       return component;
   })
);
