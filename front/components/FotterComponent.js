import { defineComponent, defineAsyncComponent, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import * as comm from "../communicationManager/communicationManager.js";


export const FotterComponent = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/footer/footerComponent.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'FotterComponent',
            emits: ['updatePage'],
            setup(props, { emit }) {

                onMounted(() => {
                });

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