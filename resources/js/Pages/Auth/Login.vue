<template>
  <AuthLayout>
    <Head title="Login" />
    <form @submit.prevent="form.post(route('login'))">
      <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end"
          >Email Address</label
        >

        <div class="col-md-6">
          <input
            id="email"
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            name="email"
            v-model="form.email"
            required
            autocomplete="email"
            autofocus
          />

          <span class="invalid-feedback" role="alert">
            <strong>error will show here</strong>
          </span>
        </div>
      </div>

      <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end"
          >Password</label
        >

        <div class="col-md-6">
          <input
            id="password"
            type="password"
            class="form-control @error('password') is-invalid @enderror"
            name="password"
            v-model="form.password"
            required
            autocomplete="current-password"
          />

          <span class="invalid-feedback" role="alert">
            <strong>error will show here</strong>
          </span>
        </div>
      </div>

      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">Login</button>

          <!-- @if (Route::has('password.request'))
                  <a
                    class="btn btn-link"
                    href="{{ route('password.request') }}"
                  >
                    Forgot Your Password?
                  </a>
                  @endif -->
        </div>
      </div>
    </form>
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