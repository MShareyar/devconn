<template>
  <AppLayout>
    <Head title="Create Post" />
    <section>
      <h1 class="large text-primary">Posts</h1>
      <p class="lead"><i class="fas fa-user"></i> Welcome to the community!</p>

      <div class="post-form">
        <div class="bg-primary p">
          <h3>Say Something...</h3>
        </div>
        <form class="form my-1" @submit.prevent="form.post(route('post.store'))">
          <div class="form-group">
            <input
              type="text"
              v-model="form.title"
              placeholder="Title"
              max="100"
              required
              class="form-control"
            />

            <span class="text text-danger" v-if="errors.title">
            {{ errors.title }}
          </span>
          </div>

          <div class="form-group">
            <textarea
                class="form-control"
              name="text"
              cols="30"
              rows="5"
              placeholder="Create a post"
              required
              v-model="form.content"
            ></textarea>

            <span class="text text-danger" v-if="errors.content">
            {{ errors.content }}
          </span>
          </div>
          <input type="submit" class="btn btn-dark my-1" value="Submit" />
          <Link :href="route('post.index')" class="btn btn-primary my-1" value="Submit" > Back to posts</Link>
        </form>
      </div>

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
        content: "",
      }),
    };
  },
};
</script>