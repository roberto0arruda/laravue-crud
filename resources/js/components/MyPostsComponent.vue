<template>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form-component @new="addPost"></form-component>

      <div class="card card-outline-secondary my-4">
        <div class="card-header">Posts</div>

        <div class="card-body">
          <post-component
            v-for="(post, index) in posts"
            :key="post.id"
            :post="post"
            @update="updatePost(index, ...arguments)"
            @delete="deletePost(index)"
          ></post-component>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: []
    };
  },
  mounted() {
    axios.get("/api/v1/posts").then(response => {
      this.posts = response.data;
    });
  },
  methods: {
    addPost(post) {
      this.posts.push(post);
    },
    updatePost(index, post) {
      this.posts[index] = post;
    },
    deletePost(index) {
      this.posts.splice(index, 1);
    }
  }
};
</script>
