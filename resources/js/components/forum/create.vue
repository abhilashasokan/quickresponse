<template>
  <v-container>
    <v-form @submit.prevent="create">
      <v-text-field v-model="form.title" type="text" label="Title" required></v-text-field>
      <span class="red--text" v-if="errors.title">{{errors.title}}</span>
      <v-autocomplete
        :items="categories"
        v-model="form.category_id"
        item-text="name"
        item-value="id"
        label="Category"
        autocomplete
      ></v-autocomplete>
      <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>

      <v-btn color="green" type="submit">Create</v-btn>
    </v-form>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: null,
        category_id: null,
        body:null
      },
      errors: {},
      categories: {}
    };
  },
  created() {
    axios.get("/api/category/").then(res => (this.categories = res.data.data));
  },
  methods: {
    create() {
        axios.post('/api/questions', this.form)
        .then(res => this.$router.push(res.data.path))
        .catch(error => this.errors = error.response.data.error)
    }
  }
};
</script>

<style>
</style>


