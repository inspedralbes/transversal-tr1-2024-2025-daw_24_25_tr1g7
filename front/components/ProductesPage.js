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

                const opinions = reactive({data:[]});
                const newOpinion = reactive({
                    idProductes: props.productSelected.id || null,
                    opinion_number: 0,
                    opinion: '',
                    img: ''
                });

                const stats = reactive ({
                    average_rating: 0,
                    recommend_percentage: 0,
                     star_counts: {
                        '5': 0,
                        '4': 0,
                        '3': 0,
                        '2': 0,
                        '1': 0
                    },
                    totalOpinions: 0
                });

                const loadOpinionsAndStats = async () => {
                    try {
                        const statsData = await comm.getOpinionsStats(props.productSelected.id);
                        Object.assign(stats, statsData);
                    } catch (error) {
                        console.error('Error al cargar opiniones y estadísticas:', error);
                    }
                };

                // Función para establecer la calificación
                const setRating = (rating) => {
                newOpinion.opinion_number = rating;
                };

                const getToken = () =>{
                    return localStorage.getItem('token');
                }

                const addOpinion = async() => {
                    let opinion = await comm.storeOpinion(getToken(),newOpinion);
                    console.log(opinion)

                    // Limpiar el formulario y recargar las opiniones
                    newOpinion.opinion_number = 0;
                    newOpinion.opinion = '';
                    newOpinion.img = '';

                    opinions.data.push(opinion.opinion);
                    loadOpinionsAndStats();
                }

                onMounted(async () => {
                    console.log("Cargando opiniones para el producto:", props.productSelected.id);
                    const response = await comm.getOpinions(props.productSelected.id);
                    console.log("Opiniones obtenidas:", response);
                    opinions.data = response.opinions;
                    console.log(opinions.data)
                    loadOpinionsAndStats();
                });

                //onMounted(loadOpinionsAndStats);

                return {
                    product: props.productSelected,
                    newOpinion,
                    addOpinion,
                    stats,
                    opinions,
                    setRating, 
                    addToCart
                };
            }
        }))
    ]).then(([template, component]) => {
        component.template = template
        return component
    })
);
