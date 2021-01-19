//importar vue y vue-router
import Vue from 'vue';
import VueRouter from 'vue-router';


//importar componente principal 
import InicioPropiedades from '../components/InicioPropiedades'
import MostrarPropiedad from '../components/MostrarPropiedad'


// crear un arreglo con las rutas 
const routes = [
    {
        path:'/',
        component: InicioPropiedades
    },
    {
        path:'/propiedades/:id',
        name:"propiedades",
        component: MostrarPropiedad
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.use(VueRouter);

export default router;

