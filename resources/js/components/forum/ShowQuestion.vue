<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <div>
          <div class="headline">{{questionObject.title}}</div>
          <span
            class="gray--text"
            name="asds"
          >{{questionObject.user}} said {{questionObject.created_on}}</span>
        </div>
        <v-spacer></v-spacer>
        <v-btn color="teal">5 Replies</v-btn>
      </v-card-title>
      <v-card-text v-html="body"></v-card-text>

      <v-card-actions v-if="own">
        <v-btn icon small @click="edit">
          <v-icon color="orange">edit</v-icon>
        </v-btn>
        <v-btn icon small @click="destroy">
          <v-icon color="red">delete</v-icon>
        </v-btn>
      </v-card-actions>
    </v-container>
  </v-card>
</template>

<script>
export default {
  props: ["questionObject"],
  data() {
    return {
      own: User.own(this.questionObject.id)
    };
  },
  computed: {
    body() {
      return md.parse(this.questionObject.body);
    }
  },
  methods: {
    destroy() {
      axios.delete(`/api/questions/${this.questionObject.slug}`)
      .then(res=> this.$router.push('/forum'))
      .catch(error => console.log(error.response.data)); 
    },
    edit() {
      EventBus.$emit("StartQuestionEditing")
    }
  }
};
</script>

<style>
</style>
 