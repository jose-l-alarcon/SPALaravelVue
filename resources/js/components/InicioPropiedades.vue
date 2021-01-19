<template>
    <div>  
      <categoria-dpto></categoria-dpto>
      <categoria-casas></categoria-casas>
    </div>
</template>

<script>



import CategoriaDpto from './CategoriaDpto';
import CategoriaCasas from './CategoriaCasas';

    export default {
    // registrar componente hijo
       components:{

              CategoriaDpto,
              CategoriaCasas           

       }
    }
</script>
