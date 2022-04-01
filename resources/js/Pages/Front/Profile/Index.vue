<template>
  <AppLayout>
    <Head title="Developers" />
      <h1 class="large text-primary">Developers</h1>
      <p class="lead">
        <i class="fab fa-connectdevelop"></i> Browse and connect with developers
      </p>
      <div class="profiles">
        <div
          class="profile bg-light"
          v-for="(userprofile, key) in usersprofile"
          :key="key"
        >
          <img
            class="round-img"
            src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200"
            alt=""
          />
          <div>
            <h2>{{ userprofile.user_name }}</h2>
            <p>{{ userprofile.company }}</p>
            <p>{{ userprofile.location }}</p>
            <Link :href="route('usersprofile.show',userprofile.id)" class="btn btn-primary">View Profile</Link>
          </div>

          <ul>
            <li class="text-primary" v-for="skill,skillkey in userprofile.user_skills" :key="skillkey">
              <i class="fas fa-check"></i> {{ skill }}
            </li>
          </ul>
        </div>
      </div>
  </AppLayout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import AppLayout from "../../../layouts/front/AppLayout.vue";
export default {
  components: { Head, Link, AppLayout },
  props: {
    usersprofile: Array,
  },
};
</script>