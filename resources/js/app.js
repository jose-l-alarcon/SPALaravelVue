

require('./bootstrap');

window.Vue = require('vue');

import router from './router';



Vue.component('pagina-inicio', require('./components/PaginaInicioComponent.vue').default);



const app = new Vue({
    el: '#app',
    router
});

require('./mapa');
require('./dropzone');