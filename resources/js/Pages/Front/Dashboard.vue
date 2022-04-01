<template>
  <AppLayout>
    <Head title="Dashboard" />
    <h1 class="large text-primary">Dashboard</h1>
    <p class="lead"><i class="fas fa-user"></i> Welcome {{ user.name }}</p>
    <div class="dash-buttons">
      <template>
        <Link
          v-if="user.profile === null"
          :href="route('usersprofile.create')"
          class="btn btn-light"
          ><i class="fas fa-user-circle text-primary"></i> Edit Profile
        </Link>
        <Link
          v-else
          :href="route('usersprofile.edit', user.profile.id)"
          class="btn btn-light"
          ><i class="fas fa-user-circle text-primary"></i> Edit Profile
        </Link>
      </template>

      <Link :href="route('experience.create')" class="btn btn-light"
        ><i class="fab fa-black-tie text-primary"></i> Add Experience</Link
      >
      <Link :href="route('education.create')" class="btn btn-light"
        ><i class="fas fa-graduation-cap text-primary"></i> Add Education</Link
      >
    </div>

    <template v-if="user.experiences.length">
      <h2 class="my-2">Experience Credentials</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Company</th>
            <th class="hide-sm">Title</th>
            <th class="hide-sm">Years</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(experience, key) in user.experiences" :key="key">
            <td>{{ experience.company }}</td>
            <td class="hide-sm">{{ experience.title }}</td>
            <td class="hide-sm">
              {{ experience.start_date }} - {{ experience.is_currently_active ? 'Current' : experience.end_date }}
            </td>
            <td>
              <button
                @click="deleteExperience(experience.id)"
                class="btn btn-danger"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </template>

    <template v-if="user.educations.length">
      <h2 class="my-2">Education Credentials</h2>
      <table class="table">
        <thead>
          <tr>
            <th>School</th>
            <th class="hide-sm">Degree</th>
            <th class="hide-sm">Years</th>
            <th />
          </tr>
        </thead>
        <tbody>
          <tr v-for="(education, key) in user.educations" :key="key">
            <td>{{ education.school }}</td>
            <td class="hide-sm">{{ education.degree }}</td>
            <td class="hide-sm">
              {{ education.start_date }} - {{ education.is_currently_active ? 'Current' : education.end_date }}
            </td>
            <td>
              <button
                @click="deleteEducation(education.id)"
                class="btn btn-danger"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </template>

    <div class="my-2">
      <button class="btn btn-danger">
        <i class="fas fa-user-minus"></i>

        Delete My Account
      </button>
    </div>
  </AppLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import AppLayout from "../../layouts/front/AppLayout.vue";
export default {
  components: { Head, Link, AppLayout },
  props: {
    user: Object,
  },
  methods: {
    deleteEducation(educationId) {

      if(confirm('Are you sure?')){
        this.$inertia.delete(route("education.destroy", educationId));
      }
    },
    deleteExperience(experienceId) {
      if(confirm('Are you sure?')){
        this.$inertia.delete(route("experience.destroy", experienceId));
      }
    },
  },
};
</script>