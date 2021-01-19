import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        // obtiene la consulta como array de objetos 
        departamentos:[],
        casas:[],
        // obtiene la consulta como objetos
        propiedades:{}
      
    },
    mutations: {
        // pasar como parametros el state y la consulta de la api
        AGREGAR_DPTOS(state, departamentos) {
            state.departamentos = departamentos;
        },
        AGREGAR_CASAS(state, casas) {
            state.casas = casas;
        },
        AGREGAR_PROPIEDADES(state, propiedades) {
            state.propiedades = propiedades;
        },

    },

    getters: {
     obtenerPropiedad : state => {
       return state.propiedades

     }

    }
});
