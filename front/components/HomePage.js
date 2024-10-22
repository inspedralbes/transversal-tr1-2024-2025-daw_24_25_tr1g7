import { defineComponent, defineAsyncComponent, reactive, computed } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";


export const HomePage = defineAsyncComponent(() =>
   Promise.all([
       fetch('./templates/home/homePage.html').then(response => response.text()),
       Promise.resolve(defineComponent({
           name: 'HomePage',
           
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
