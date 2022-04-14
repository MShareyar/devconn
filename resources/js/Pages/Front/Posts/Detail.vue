<template>
  <AppLayout>
    <Head title="View Post" />
    <section>
      <Link :href="route('post.index')" class="btn">Back To Posts</Link>
      <div class="post bg-white p-1 my-1">
        <div>
          <Link :href="route('usersprofile.show', post.user_id)">
            <img
              class="round-img"
              src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200"
              alt=""
            />
            <h4>{{ post.created_by }}</h4>
          </Link>
        </div>
        <div>
          <h3>{{ post.title }}</h3>
          <p class="my-1">{{ post.content }}</p>
        </div>
      </div>

      <div class="post-form">
        <div class="bg-primary p">
          <h3>Leave A Comment</h3>
        </div>
        <form
          class="form my-1"
          @submit.prevent="form.post(route('comments.store'),{preserveState: false})"
        >
          <textarea
            name="text"
            cols="30"
            rows="5"
            placeholder="Comment on this post"
            required
            v-model="form.message"
          ></textarea>
          <input type="submit" class="btn btn-dark my-1" value="Submit" />
        </form>
      </div>

      <div class="comments">
        <div
          class="post bg-white p-1 my-1"
          v-for="(comment, key) in post.comments"
          :key="key"
        >
          <div>
            <Link :href="route('usersprofile.show', comment.commenter_id)">
              <img
                class="round-img"
                src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200"
                alt=""
              />
              <h4>{{ comment.commenter_name }}</h4>
            </Link>
          </div>
          <div>
            <p class="my-1">{{ comment.comment }}</p>
            <p class="post-date">Posted on {{ comment.created_at}}</p>
            <button type="button" class="btn btn-danger" v-if="comment.can_delete" @click="deleteComment(comment.id)">
              <i class="fas fa-times"></i>
            </button>
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
    user: Object,
    post: Object,
    errors: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        message: "",
        commentable_type: "App\\Models\\Post",
        commentable_id: "" + this.post.id + "",
      }),
    };
  },
  methods:{
      deleteComment(commentId) {

      if(confirm('Are you sure?')){
        this.$inertia.delete(route("comments.destroy", commentId));
        location.reload();
      }
    },
  }
};
</script>