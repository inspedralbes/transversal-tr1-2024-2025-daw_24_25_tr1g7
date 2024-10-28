import { defineComponent, defineAsyncComponent, reactive, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js";

export const ProfilePage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/profile/profilePage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'ProfilePage',
            emits: ['updatePage'],
            setup(props, { emit }) {

                const tab = ref('myData');
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

                onMounted(async () => {
                });

                return {
                    tab,
                    logout
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template;
        return component;
    })
);
