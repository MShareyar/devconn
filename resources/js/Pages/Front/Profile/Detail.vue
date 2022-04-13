<template>
  <AppLayout>
    <Head title="User Profile Details" />
    <section>
      <Link :href="route('usersprofile.index')" class="btn btn-light"
        >Back To Profiles</Link
      >

      <div class="profile-grid my-1">
        <!-- Top -->
        <div class="profile-top bg-primary p-2">
          <img
            class="round-img my-1"
            src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200"
            alt=""
          />
          <h1 class="large">{{ usersprofile.user_name }}</h1>
          <p class="lead">{{ usersprofile.professional_title }}</p>
          <p>{{ usersprofile.location }}</p>
          <div class="icons my-1">
            <a href="#" target="_blank" rel="noopener noreferrer">
              <i class="fas fa-globe fa-2x"></i>
            </a>
            <a href="#" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a href="#" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a href="#" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-linkedin fa-2x"></i>
            </a>
            <a href="#" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-youtube fa-2x"></i>
            </a>
            <a href="#" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-instagram fa-2x"></i>
            </a>
          </div>
        </div>

        <!-- About -->
        <div class="profile-about bg-light p-2">
          <h2 class="text-primary">{{ usersprofile.user_name }} Bio</h2>
          <p>
            {{ usersprofile.short_bio }}
          </p>
          <div class="line"></div>
          <h2 class="text-primary">Skill Set</h2>
          <div class="skills">
            <div
              class="p-1"
              v-for="(skill, key) in usersprofile.user_skills"
              :key="key"
            >
              <i class="fa fa-check"></i> {{ skill }}
            </div>
          </div>
        </div>

        <!-- Experience -->
        <div class="profile-exp bg-white p-2">
          <h2 class="text-primary">Experience</h2>
          <div v-for="(experience, exKey) in experiences" :key="exKey">
            <h3 class="text-dark">{{ experience.company }}</h3>
            <p>
              {{ experience.start_date }} -
              {{
                experience.is_currently_active ? "Current" : experience.end_date
              }}
            </p>
            <p><strong>Position: </strong> {{ experience.title }}</p>
            <p>
              <strong>Description: </strong>{{experience.description}}.
            </p>
          </div>
        </div>

        <!-- Education -->
        <div class="profile-edu bg-white p-2">
          <h2 class="text-primary">Education</h2>
          <div v-for="(education, edKey) in educations" :key="edKey">
            <h3>{{ education.school }}</h3>
            <p>
              {{ education.start_date }} -
              {{
                education.is_currently_active ? "Current" : education.end_date
              }}
            </p>
            <p><strong>Degree: </strong> {{education.degree }}</p>
            <p><strong>Field Of Study: </strong>{{ education.field_of_Study}}</p>
            <p>
              <strong>Description: </strong>{{education.description}}
            </p>
          </div>
        </div>

        <!-- Github -->
        <div class="profile-github">
          <h2 class="text-primary my-1">
            <i class="fab fa-github"></i> Github Repos
          </h2>
          <div class="repo bg-white p-1 my-1">
            <div>
              <h4>
                <a href="#" target="_blank" rel="noopener noreferrer"
                  >Repo One</a
                >
              </h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Repellat, laborum!
              </p>
            </div>
            <div>
              <ul>
                <li class="badge badge-primary">Stars: 44</li>
                <li class="badge badge-dark">Watchers: 21</li>
                <li class="badge badge-light">Forks: 25</li>
              </ul>
            </div>
          </div>
          <div class="repo bg-white p-1 my-1">
            <div>
              <h4>
                <a href="#" target="_blank" rel="noopener noreferrer"
                  >Repo Two</a
                >
              </h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Repellat, laborum!
              </p>
            </div>
            <div>
              <ul>
                <li class="badge badge-primary">Stars: 44</li>
                <li class="badge badge-dark">Watchers: 21</li>
                <li class="badge badge-light">Forks: 25</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </AppLayout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import AppLayout from "../../../layouts/front/AppLayout.vue";
export default {
  components: { Head, Link, AppLayout },
  props: {
    usersprofile: Object,
    educations: Array,
    experiences: Array,
  },
};
</script>