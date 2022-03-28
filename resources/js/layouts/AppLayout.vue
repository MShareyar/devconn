<template>
  <div class="wrapper">

    <MainSideBar />
    <slot />
  </div>
</template>4


<script>
import MainSideBar from "../layouts/MainSiderBar.vue";

export default {
  components: { MainSideBar },
  props: {
    user: Object,
  },
  mounted() {
    console.log(this.user);
  },
};
</script>