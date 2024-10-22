import { defineComponent, defineAsyncComponent, reactive, computed } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";


export const ProductesPage = defineAsyncComponent(() =>
   Promise.all([
       fetch('./templates/home/ProductesPage.html').then(response => response.text()),
       Promise.resolve(defineComponent({
           emits: ['updatePage'],
           setup(props, { emit }) {
               const goToRegister = () => {
                   emit('updatePage', 'register');
               };


               return {
                   goToRegister,
                  
               };
           }
       }))
   ]).then(([template, component]) => {
       component.template = template
       return component
   })
)
