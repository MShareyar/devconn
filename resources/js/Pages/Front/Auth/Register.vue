<template>
  <AppLayout>
    <Head title="Login" />
    <section class="container">

      <div class="alert alert-danger" v-if="errors.length">
        <ul>
          <li v-for="(error,key) in errors" :key="key">
              {{ error }}
          </li>
        </ul>
      </div>

      <h1 class="large text-primary">Sign Up</h1>
      <p class="lead"><i class="fas fa-user"></i> Create Your Account</p>
      <form class="form" @submit.prevent="form.post(route('front.register'))">
        <div class="form-group">
          <input
            type="text"
            placeholder="Name"
            name="name"
            required
            v-model="form.name"
            autocomplete="off"
          />
          <span class="text text-danger" v-if="errors.name">{{errors.name}}</span>
        </div>
        <div class="form-group">
          <input
            type="email"
            placeholder="Email Address"
            name="email"
            v-model="form.email"
            autocomplete="off"
          />
          <!-- <small class="form-text"
            >This site uses Gravatar so if you want a profile image, use a
            Gravatar email</small> -->

          <span class="text text-danger" v-if="errors.email">{{errors.email}}</span>
        </div>
        <div class="form-group">
          <input
            type="password"
            placeholder="Password"
            name="password"
            v-model="form.password"
            autocomplete="off"
          />
          <span class="text text-danger" v-if="errors.password">{{errors.password}}</span>

        </div>
        <div class="form-group">
          <input
            type="password"
            placeholder="Confirm Password"
            name="password_confirmation"
            v-model="form.password_confirmation"
            autocomplete="off"
          />
        </div>
        <input type="submit" class="btn btn-primary" value="Register" />
      </form>
      <p class="my-1">
        Already have an account?
        <Link :href="route('front.login')">Sign In</Link>
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
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      }),
    };
  },
};
</script>