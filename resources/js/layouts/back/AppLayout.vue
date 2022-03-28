<template>
  <div class="wrapper">

    <MainSideBar />
    <slot />
  </div>
</template>4


<script>
import MainSideBar from "../../layouts/back/MainSiderBar.vue";

export default {
  components: { MainSideBar }
};
</script>