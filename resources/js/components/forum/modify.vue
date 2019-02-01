<template>
  <v-container>
    <v-form @submit.prevent="update">
      <v-text-field v-model="form.title" type="text" label="Title" required></v-text-field>
      <span class="red--text" v-if="errors.title">{{errors.title}}</span>
      <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>
      <v-btn color="teal" type="submit" @click="cancel">Save</v-btn>
      <v-btn color="delete" @click="cancel">Cancel</v-btn>
    </v-form>
  </v-container>
</template>

<script>
export default {
  props: ["questionObject"],
  data() {
    return {
      form: {
        title: null,
        body: null
      },
      errors: {},
      categories: {}
    };
  },
  created() {
    axios.get("/api/category/").then(res => (this.categories = res.data.data));
  },
  mounted() {
    this.form = this.questionObject;
  },
  methods: {
    cancel() {
      EventBus.$emit("CancelQuestionEditing");
    },
    update() {
      axios
        .patch(`/api/questions/${this.form.slug}`, this.form)
        .then(res => this.cancel)
        .catch(error => (this.errors = error.response.data.error));
    }
  }
};
</script>

<style>
</style>


