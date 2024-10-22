import { defineComponent, defineAsyncComponent, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';

export const TestComponent = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/testComponent.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            emits: ['updatePage'],
            props: {

            },
            setup(props) {

                return {

                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
