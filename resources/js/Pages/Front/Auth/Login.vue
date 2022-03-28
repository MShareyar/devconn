<template>
  <AppLayout>
    <Head title="Login" />
    <section class="container">
      <div class="alert alert-danger" v-if="errors.password">
        {{ errors.password }}
      </div>

      <h1 class="large text-primary">Sign In</h1>
      <p class="lead"><i class="fas fa-user"></i> Sign into Your Account</p>
      <form class="form" @submit.prevent="form.post(route('front.login'))">
        <div class="form-group">
          <input
            type="email"
            placeholder="Email Address"
            name="email"
            v-model="form.email"
            required
            autocomplete="off"
          />
        </div>
        <div class="form-group">
          <input
            type="password"
            v-model="form.password"
            placeholder="Password"
            name="password"
          />
        </div>
        <input type="submit" class="btn btn-primary" value="Login" />
      </form>
      <p class="my-1">
        Don't have an account?
        <Link :href="route('front.register')">Sign Up</Link>
      </p>
    </section>
  </AppLayout>
</template>

<script>
import AppLayout from "../../../layouts/front/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue";

export default {
  components: {
    Head,
    Link,
    AppLayout,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
      }),
    };
  },
};
</script>