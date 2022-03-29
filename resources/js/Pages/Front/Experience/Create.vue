<template>
  <AppLayout>
    <Head title="Edit Profile" />
    <section class="container">
      <h1 class="large text-primary">
       Add An Experience
      </h1>
      <p class="lead">
        <i class="fas fa-code-branch"></i> Add any developer/programming
        positions that you have had in the past
      </p>
      <small>* = required field</small>
      <form class="form" @submit.prevent="form.post(route('experience.store'))">
        <div class="form-group">
          <input
            type="text"
            placeholder="* Job Title"
            name="title"
            v-model="form.title"
            required
          />
          <span class="text text-danger" v-if="errors.title">
            {{ errors.title }}
          </span>
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="* Company"
            name="company"
            v-model="form.company"
            required
          />
          <span class="text text-danger" v-if="errors.company">
            {{ errors.company }}
          </span>
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="* Location"
            name="location"
            v-model="form.location"
          />
          <span class="text text-danger" v-if="errors.location">
            {{ errors.location }}
          </span>
        </div>
        <div class="form-group">
          <h4>From Date</h4>
          <input type="date" name="from" v-model="form.start_date"  />
          <span class="text text-danger" v-if="errors.start_date">
            {{ errors.start_date }}
          </span>
        </div>
         <div class="form-group">
          <p>
            <input
              type="checkbox"
              name="current"
              value=""
              v-model="form.is_currently_active"
            />
            Current Job
          </p>
          <span class="text text-danger" v-if="errors.is_currently_active">
            {{ errors.is_currently_active }}
          </span>
        </div>
        <div class="form-group">
          <h4>To Date</h4>
          <input type="date" name="to" v-model="form.end_date" />
          <span class="text text-danger" v-if="errors.end_date">
            {{ errors.end_date }}
          </span>
        </div>
        <div class="form-group">
          <textarea
            name="description"
            cols="30"
            rows="5"
            placeholder="Job Description"
            v-model="form.description"
          ></textarea>
          <span class="text text-danger" v-if="errors.description">
            {{ errors.description }}
          </span>
        </div>
        <input type="submit" class="btn btn-primary my-1" />
        <Link class="btn btn-light my-1" :href="route('front.dashboard')">Go Back</Link>
      </form>
    </section>
  </AppLayout>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import AppLayout from "../../../layouts/front/AppLayout.vue";
export default {
  components: { Head, Link, AppLayout },
  props:{
    errors:Object
  },
  data() {
    return {
      form: this.$inertia.form({
        title: "",
        company: "",
        location: "",
        start_date: "",
        end_date: null,
        is_currently_active: 0,
        description: "",
      }),
    };
  },
};
</script>