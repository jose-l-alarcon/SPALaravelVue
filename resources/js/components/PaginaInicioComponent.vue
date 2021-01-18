<template>
    <div>
     
      <categoria-dpto></categoria-dpto>
  
      
    </div>
</template>


<script>


import store from '../store'
import CategoriaDpto from './CategoriaDpto';
// import CategoriaCasas from './CategoriaCasas';

    export default {
        store,
    // registrar componente hijo
       components:{

              CategoriaDpto
           
              

       }
    }
</script>
