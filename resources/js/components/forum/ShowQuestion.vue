<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <div>
          <div class="headline">{{questionObject.title}}</div>
          <span class="gray--text" name="asds">{{questionObject.user}} said {{questionObject.created_on}}</span>
        </div>       
        <v-spacer></v-spacer> 
        <v-btn color="teal">5 Replies</v-btn>
      </v-card-title>
      <v-card-text v-html="body"></v-card-text>
    </v-container>
  </v-card>
</template>

<script>
export default {
  props: ["questionObject"],
  computed: {
    body() {
      return md.parse(this.questionObject.body)
    }
  }
};
</script>

<style>
</style>
