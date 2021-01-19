<template>
    <div class="container my-5">
       <h2>Departamentos</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="departamento in this.departamentos " v-bind:key="departamento.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${departamento.imagen_principal}`" alt="card del restaurant" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ departamento.nombre }} </h3>
                        <p class="card-text"> {{departamento.direccion}}</p>             

                            <router-link :to="{ name: 'propiedades', params: { id: departamento.id}}">   
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
           axios.get('/api/categorias/departamento')
           .then(respuesta => {
             this.$store.commit("AGREGAR_DPTOS", respuesta.data);
            // this.departamentos = respuesta.data;

           })
          },
            computed: {
                departamentos(){
                    return this.$store.state.departamentos;
                }
            }
    }
</script>