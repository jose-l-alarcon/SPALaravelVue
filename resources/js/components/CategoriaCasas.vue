<template>
    <div class="container my-5">
       <h2>Casas</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="casa in this.casas " v-bind:key="casa.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${casa.imagen_principal}`" alt="card del restaurant" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ casa.nombre }} </h3>
                        <p class="card-text"> {{casa.direccion}}</p>
                        <p class="card-text">
                            
                        </p>
                        <router-link :to="{ name: 'propiedades', params: { id: casa.id}}">   
                                <a class="btn btn-primary d-block">Ver Lugar</a></router-link>   
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>


<script>
    export default {


        mounted() {
           axios.get('/api/categorias/casa')
           .then(respuesta => {
              this.$store.commit("AGREGAR_CASAS", respuesta.data);

           })
        },
            computed: {
                casas(){
                    return this.$store.state.casas;
                }
            }
    }
</script>