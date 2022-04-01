<template>
  <AppLayout>
    <Head title="Welcome To The Developer Connector" />
      <div class="dark-overlay">
        <div class="landing-inner">
          <h1 class="x-large">Developer Connector</h1>
          <p class="lead">
            Create a developer profile/portfolio, share posts and get help from
            other developers
          </p>
          <div class="buttons">
            <Link :href="route('front.register')" class="btn btn-primary">Sign Up</Link>
            <Link :href="route('front.login')" class="btn btn-light">Login</Link>
          </div>
        </div>
      </div>
  </AppLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import AppLayout from "../../layouts/front/AppLayout.vue";
export default {
  components: { Head, Link, AppLayout },
};
</script>