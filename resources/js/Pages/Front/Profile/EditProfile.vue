<template>
  <AppLayout>
    <Head title="Edit Profile" />
    <section class="container">
      <h1 class="large text-primary"> {{ usersprofile === undefined ? 'Create' : 'Edit'}} Your Profile</h1>
      <p class="lead">
        <i class="fas fa-user"></i> Let's get some information to make your
        profile stand out
      </p>
      <small>* = required field</small>
      <form
        class="form"
        @submit.prevent="
          usersprofile === undefined
            ? form.post(route('usersprofile.store'))
            : form.put(route('usersprofile.update', usersprofile.id))
        "
      >
        <div class="form-group">
          <select name="status" v-model="form.professional_status">
            <option value="0">* Select Professional Status</option>
            <option value="1">Developer</option>
            <option value="2">Junior Developer</option>
            <option value="3">Senior Developer</option>
            <option value="4">Manager</option>
            <option value="5">Student or Learning</option>
            <option value="6">Instructor or Teacher</option>
            <option value="7">Intern</option>
            <option value="8">Other</option>
          </select>
          <span v-if="errors.professional_status">
            {{ errors.professional_status }}
          </span>
          <small class="form-text"
            >Give us an idea of where you are at in your career</small
          >
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="Company"
            name="company"
            v-model="form.company"
          />
          <span v-if="errors.company">
            {{ errors.company }}
          </span>
          <small class="form-text"
            >Could be your own company or one you work for</small
          >
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="Website"
            name="website"
            v-model="form.website"
          />
          <span v-if="errors.website">
            {{ errors.website }}
          </span>
          <small class="form-text"
            >Could be your own or a company website</small
          >
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="* Location"
            name="location"
            v-model="form.location"
          />
          <span v-if="errors.location">
            {{ errors.location }}
          </span>
          <small class="form-text"
            >City & state suggested (eg. Boston, MA)</small
          >
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="* Skills"
            name="skills"
            v-model="form.skills"
          />
          <span v-if="errors.skills">
            {{ errors.skills }}
          </span>
          <small class="form-text"
            >Please use comma separated values (eg.
            HTML,CSS,JavaScript,PHP)</small
          >
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="Githhub Username"
            name="githhub_username"
            v-model="form.githhub_username"
          />
          <span v-if="errors.githhub_username">
            {{ errors.githhub_username }}
          </span>
          <small class="form-text"
            >If you want your latest repos and a Github link, include your
            username</small
          >
        </div>
        <div class="form-group">
          <textarea
            placeholder="* A short bio of yourself"
            name="bio"
            v-model="form.short_bio"
          >
          </textarea>
          <span v-if="errors.short_bio">
            {{ errors.short_bio }}
          </span>
          <small class="form-text">Tell us a little about yourself</small>
        </div>

        <!-- <div class="my-2">
          <button type="button" class="btn btn-light">
            Add Social Network Links
          </button>
          <span>Optional</span>
        </div>

        <div class="form-group social-input">
          <i class="fab fa-twitter fa-2x"></i>
          <input type="text" placeholder="Twitter URL" name="twitter" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-facebook fa-2x"></i>
          <input type="text" placeholder="Facebook URL" name="facebook" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-youtube fa-2x"></i>
          <input type="text" placeholder="YouTube URL" name="youtube" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-linkedin fa-2x"></i>
          <input type="text" placeholder="Linkedin URL" name="linkedin" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-instagram fa-2x"></i>
          <input type="text" placeholder="Instagram URL" name="instagram" />
        </div> -->
        <input type="submit" class="btn btn-primary my-1" />
        <Link class="btn btn-light my-1" :href="route('front.dashboard')"
          >Go Back
          
        </Link>
      </form>
    </section>
  </AppLayout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import AppLayout from "../../../layouts/front/AppLayout.vue";
export default {
  components: { Head, Link, AppLayout },
  props: {
    user: Object,
    errors: Object,
    usersprofile: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        professional_status: this.usersprofile
          ? this.usersprofile.professional_status
          : 0,
        company: this.usersprofile ? this.usersprofile.company : "",
        location: this.usersprofile ? this.usersprofile.location : "",
        website: this.usersprofile ? this.usersprofile.website : "",
        skills: this.usersprofile ? this.usersprofile.skills : "",
        short_bio: this.usersprofile ? this.usersprofile.short_bio : "",
      }),
    };
  },
};
</script>