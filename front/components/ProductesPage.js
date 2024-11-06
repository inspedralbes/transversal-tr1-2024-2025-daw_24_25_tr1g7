import { defineComponent, defineAsyncComponent, reactive, ref, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
import * as comm from "../communicationManager/communicationManager.js"
export const ProductesPage = defineAsyncComponent(() =>
    Promise.all([
        fetch('./templates/home/ProductesPage.html').then(response => response.text()),
        Promise.resolve(defineComponent({
            name: 'ProductesPage',
            props: {
                productSelected: {
                    type: Object,
                    default: () => ({}) // Función que devuelve un objeto vacío por defecto
                }
            },
            emits: ['updatePage'],
            setup(props, { emit }) {

                const addToCart = (producte) => {
                    console.log("Añadido al carrito:", producte);
                    emit('addProductToCart', producte);
                };

                const opinions = reactive({ data:[] });
                const newOpinion = reactive({
                    idProductes: props.productSelected.id || null,
                    opinion_number: 0,
                    opinion: '',
                    img: ''
                });

                const getToken = () =>{
                    return localStorage.getItem('token');
                }

                // if (data.message) {
                //     opinions.value.push({...newOpinion}); // Actualiza la lista de opiniones
                //     newOpinion.opinion = '';
                //     newOpinion.opinion_number = 0;
                //     newOpinion.img = '';
                // }

                const addOpinion = async() => {
                    let opinion = await comm.storeOpinion(getToken(),newOpinion);
                    console.log(opinion)
                }
            
                onMounted( async () => {
                    opinions.data= await comm.getOpinions(props.productSelected.id);
                });

                return {
                    product: props.productSelected,
                    newOpinion,
                    opinions,
                    addOpinion,
                    addToCart
                    
                };


            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
);
