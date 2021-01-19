<template>
    <div class="container my-5">
        <h2 class="text-center mb-5"> {{propiedades.nombre}} </h2>

        <div class="row align-items-start">
            <div class="col-md-8 order-2">
                    <img :src="`../storage/${propiedades.imagen_principal}`" class="img-fluid" alt="imagen propiedad">
                    <p class="mt-3"> {{propiedades.descripcion}} </p>
                    <galeria-imagenes></galeria-imagenes>
            </div>

            <aside class="col-md-4 order-1">
               

                <div class="p-4 bg-primary ">
                    <h3 class="text-center text-white mt-2 mb-4">Más Información</h3>

                    <p class="text-white mt-1">
                        <span class="font-weight-bold">
                            Ubicación:
                        </span>
                        {{ propiedades.direccion }}
                    </p>

                    <p class="text-white mt-1">
                        <span class="font-weight-bold"  v-if="propiedades.zona">
                            Zona: {{ propiedades.zona }} 
                        </span>
                         <span class="font-weight-bold"  v-else>
                            Zona: Sin especificar
                        </span>
                    </p>

                    <p class="text-white mt-1">
                        <span class="font-weight-bold">
                            Teléfono:
                        </span>
                        {{ propiedades.telefono }}
                    </p>
                </div>
            </aside>
        </div>
    </div>
</template>

<script>
    export default {

       
        mounted() {
        //   obtener el parametro pasado en router
          const { id } = this.$route.params;
           axios.get('/api/propiedades/' + id)
           .then(respuesta => {
            this.$store.commit('AGREGAR_PROPIEDADES', respuesta.data)
           })
          },
            computed: {
              propiedades(){
                return this.$store.getters.obtenerPropiedad;

              }
            }
    }
</script>