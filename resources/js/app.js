

require('./bootstrap');

window.Vue = require('vue');



Vue.component('pagina-inicio', require('./components/PaginaInicioComponent.vue').default);
Vue.component('categoria-dpto', require('./components/CategoriaDptoComponent.vue').default);
Vue.component('categoria-casas', require('./components/CategoriaCasasComponent.vue').default);


const app = new Vue({
    el: '#app',
});

require('./mapa');
require('./dropzone');