<template>
  <div>
    <Header />
    <div class="container">
      <div v-if="$page.props.flash.message" class="alert" :class="$page.props.flash.type == 'success' ?'alert-success':'alert-danger'">
        {{ $page.props.flash.message }}
      </div>
      <slot />
    </div>
  </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue";
import Header from "../front/Header.vue";

export default {
  components: { Head, Header },
};
</script>