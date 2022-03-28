<template>
  <nav class="navbar bg-dark">
    <h4>
      <Link :href="route('landing')"
        ><i class="fas fa-code"></i> DevConnector</Link
      >
    </h4>
    <ul>
      <li><Link :href="route('front.login')">Developers</Link></li>

      <template v-if="!user">
        <li><Link :href="route('front.register')">Register</Link></li>
        <li><Link :href="route('front.login')">Login</Link></li>
      </template>
      <template v-else>
        <li><Link :href="route('front.dashboard')">Posts</Link></li>

        <li>
          |
          <Link :href="route('front.dashboard')" title="Dashboard"
            ><i class="fas fa-user"></i>
            <span class="hide-sm">Dashboard</span>
          </Link>
        </li>
        <li>
          <Link :href="route('front.dashboard')" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="hide-sm">Logout</span></Link
          >
        </li>
      </template>
    </ul>
  </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";

export default {
  components: { Link },
  computed: {
    user() {
      return this.$page.props.user;
    },
  },
};
</script>