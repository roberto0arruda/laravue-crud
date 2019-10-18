<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Post form</div>

        <div class="card-body">
          <form v-on:submit.prevent="newPost()">
            <div class="form-group">
              <textarea
                name="texto"
                id="texto"
                cols="15"
                rows="3"
                class="form-control"
                aria-describedby="helpId"
                v-model="texto"
              ></textarea>
              <small id="helpId" class="text-muted">Excreva o texto</small>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      texto: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    newPost() {
      const params = {
        texto: this.texto
      };

      this.texto = "";

      axios.post("/api/v1/posts", params).then(response => {
        const post = response.data;
        this.$emit("new", post);
      });
    }
  }
};
</script>
