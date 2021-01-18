<template>
    <div>
     
      <categoria-dpto></categoria-dpto>
       <categoria-casas></categoria-casas>
      
    </div>
</template>


<script>

import CategoriaDptoComponent from './CategoriaDptoComponent';
import CategoriaCasasComponent from './CategoriaCasasComponent';

import store from '../store'

    export default {
        store,
    // registrar componente hijo
       components:{

              CategoriaDptoComponent,
               CategoriaCasasComponent

       }
    }
</script>
