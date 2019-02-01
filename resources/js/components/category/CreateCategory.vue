<template>
  <v-container>
    <v-form @submit.prevent="createCategory" method="POST">
      <v-text-field v-model="form.name" type="text" label="Category" required></v-text-field>
      <span class="red--text" v-if="errors.name">{{errors.name}}</span>
      <v-btn color="pink" type="submit" v-if="editSlug">Update</v-btn>
      <v-btn color="teal" type="submit" v-else>Save</v-btn>
    </v-form>
    <v-card class="mt-2">
      <v-toolbar color="indigo" dark>
        <v-toolbar-title>Categories</v-toolbar-title>
      </v-toolbar>

      <v-list>
        <div v-for="(category,index) in categories" :key="category.id">
          <v-list-tile>
            <v-list-tile-content>
              <v-list-tile-title>{{category.name}}</v-list-tile-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <v-btn icon small @click="editCategory(index)">
                <v-icon color="orange">edit</v-icon>
              </v-btn>
            </v-list-tile-action>
            <v-list-tile-action>
              <v-btn icon small @click="deleteCategory(category.slug,index)">
                <v-icon color="red">delete</v-icon>
              </v-btn>
            </v-list-tile-action>
          </v-list-tile>
          <v-divider></v-divider>
        </div>
      </v-list>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null
      },
      editSlug: null,
      errors: {},
      categories: {}
    };
  },
  created() {
    this.loadCategory();
  },
  methods: {
    createCategory() {
        this.editSlug ?this.updateCategory() : this.createNewCategory()
    },
    createNewCategory() {
      axios
        .post("/api/category", this.form)
        .then(res => {
          console.log(res.data);
          this.categories.unshift(res.data);
          this.form.name = null;
        })
        .catch(error => console.log(error.response.data));
    },
    updateCategory() {
        axios
        .patch(`/api/category/${this.editSlug}`, this.form)
        .then(res => { 
          this.categories.unshift(res.data);
          this.form.name = null;
          this.editSlug = null
        })
        .catch(error => console.log(error.response.data));
    },
    loadCategory() {
      axios
        .get("/api/category/")
        .then(res => (this.categories = res.data.data))
        .catch(error => console.log(this.response.data));
    },
    deleteCategory(slug, index) {
      axios
        .delete(`/api/category/${slug}`, this.form)
        .then(res => this.categories.splice(index, 1))
        .catch(error => console.log(error.response.data));
    },
    editCategory(index) {
      this.form.name = this.categories[index].name;
      this.editSlug = this.categories[index].slug;
      this.categories.splice(index,1)
    }
  }
};
</script>

<style>
</style>
