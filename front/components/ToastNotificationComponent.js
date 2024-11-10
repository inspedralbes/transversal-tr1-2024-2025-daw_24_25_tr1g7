// ToastNotification.js
import { defineComponent, defineAsyncComponent, ref, watch } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';

export const ToastNotificationComponent = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/helper/toastNotification.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'ToastNotificationComponent',
            props: {
                message: {
                    type: String,
                    default: ''
                },
                type: {
                    type: String,
                    default: 'info'  // 'success', 'error', 'warning', 'info'
                },
                show: {
                    type: Boolean,
                    default: false
                }
            },
            emits: ['update:show'],
            setup(props, { emit }) {
                const hideToast = () => {
                    emit('update:show', false);
                };

                // Auto ocultar después de 3 segundos
                watch(() => props.show, (newValue) => {
                    if (newValue) {
                        setTimeout(() => {
                            hideToast();
                        }, 3000);
                    }
                });

                return {
                    hideToast
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);