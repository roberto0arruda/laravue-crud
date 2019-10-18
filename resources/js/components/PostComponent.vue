<template>
  <div>
    <textarea cols="15" rows="3" class="form-control" v-if="editMode" v-model="post.texto"></textarea>
    <p v-else>{{ post.texto }}</p>
    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
    <small class="text-muted">Posted by Anonymous on {{ post.created_at }} - Updated by Anonymous on {{ post.updated_at }}</small>

    <div class="form-group">
      <button v-if="editMode" class="btn btn-success" v-on:click="clickUpdate()">Salvar</button>
      <button v-else class="btn btn-primary" v-on:click="clickEdit()">Editar</button>
      <button class="btn btn-danger" v-on:click="clickDelete()">Excluir</button>
    </div>
    <hr />
  </div>
</template>

<script>
export default {
  props: ["post"],
  data() {
    return {
      editMode: false
    };
  },
  methods: {
    clickDelete() {
      axios.delete(`/api/v1/posts/${this.post.id}`).then(() => {
        this.$emit("delete");
      });
    },
    clickEdit() {
      this.editMode = true;
    },
    clickUpdate() {
      const params = {
        texto: this.post.texto
      };
      axios.put(`/api/v1/posts/${this.post.id}`, params).then(response => {
        this.editMode = false;
        const post = response.data;
        this.$emit("update", post);
      });
    }
  }
};
</script>
