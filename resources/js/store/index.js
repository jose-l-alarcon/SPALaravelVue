import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        departamentos:[]
      
    },
    mutations: {
        AGREGAR_DPTOS(state, departamentos) {
            state.departamentos = departamentos;
        }
    }
});
