<template>
  <AuthLayout>
    <Head title="Login" />
    <div class="login-box">
      <div class="login-logo">
        <a href="https://adminlte.io/themes/v3/index2.html">TasksIn</a>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <form @submit.prevent="form.post(route('login'))">
            <div class="input-group mb-3">
              <input
                id="email"
                type="email"
                class="form-control"
                :class="{ 'is-invalid': errors.email }"
                name="email"
                v-model="form.email"
                autocomplete="email"
                placeholder="Email"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>

              <span class="invalid-feedback" role="alert" v-if="errors.email">
                <strong>{{ errors.email }}</strong>
              </span>
            </div>

            <div class="input-group mb-3">
              <input
                id="password"
                type="password"
                class="form-control"
                :class="{ 'is-invalid': errors.password }"
                name="password"
                v-model="form.password"
                placeholder="Password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>

              <span
                class="invalid-feedback"
                role="alert"
                v-if="errors.password"
              >
                <strong>{{ errors.password }}</strong>
              </span>
            </div>

            <div class="row">
              <div class="col-8">
                <div class="icheck-primary mt-1">
                  <a for="remember" href="#"> Forgot Password ?</a>
                </div>
              </div>

              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
            </div>

            
          </form>
        </div>
      </div>
    </div>
  </AuthLayout>
</template>

<script>
import AuthLayout from "../../layouts/AuthLayout.vue";
import { Head } from "@inertiajs/inertia-vue";

export default {
  components: {
    AuthLayout,
    Head,
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