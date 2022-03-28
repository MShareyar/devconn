<template>

  <AppLayout>
    <Head title="Dasbhoard"/>
  
  </AppLayout>
</template>


<script>
import AppLayout from '../layouts/back/AppLayout.vue';
import { Head } from '@inertiajs/inertia-vue';

export default {
  components:{ Head , AppLayout },
  props:{
    user:Object
  },
  mounted(){
    console.log(this.user)
  }
}
</script>