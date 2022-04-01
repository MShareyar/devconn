<template>
  <AppLayout>
    <Head title="Add Education" />
      <h1 class="large text-primary">Add Your Education</h1>
      <p class="lead">
        <i class="fas fa-graduation-cap"></i> Add any school, bootcamp, etc that
        you have attended
      </p>
      <small>* = required field</small>
      <form class="form" @submit.prevent="form.post(route('education.store'))">
        <div class="form-group">
          <input
            type="text"
            placeholder="* School or Bootcamp"
            name="school"
            required
            v-model="form.school"
          />
          <span class="text text-danger" v-if="errors.school">
            {{ errors.school }}
          </span>
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="* Degree or Certificate"
            name="degree"
            v-model="form.degree"
            required
          />
          <span class="text text-danger" v-if="errors.degree">
            {{ errors.degree }}
          </span>
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="* Field Of Study"
            name="fieldofstudy"
            v-model="form.field_of_study"
          />
          <span class="text text-danger" v-if="errors.field_of_study">
            {{ errors.field_of_study }}
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
            Current School or Bootcamp
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
            placeholder="Program Description"
            v-model="form.description"
          ></textarea>
          <span class="text text-danger" v-if="errors.description">
            {{ errors.description }}
          </span>
        </div>
        <input type="submit" class="btn btn-primary my-1" :value="form.processing ? 'Loading...':'Submit'"  :disabled="form.processing"/>
        <Link class="btn btn-light my-1" :href="route('front.dashboard')"
          >Go Back</Link>
      </form>
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
        school: "",
        degree: "",
        field_of_study: "",
        start_date: "",
        end_date: "",
        is_currently_active: 0,
        description: "",
      }),
    };
  },
};
</script>