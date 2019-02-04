<template>
  <div class="mt-2">
    <v-card>
      <v-card-title>
        <div class="headline">{{data.user}}</div>
        <div class="ml-2">Said {{data.created_at}}</div>
      </v-card-title>
      <v-divider></v-divider>
      <v-card-text v-html="messageBody"></v-card-text>
      <v-divider></v-divider>
      <v-card-actions v-if="own">
        <v-btn icon small>
          <v-icon>edit_location</v-icon>          
        </v-btn>
        <v-btn icon small>
          <v-icon>delete_outline</v-icon>
        </v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
export default {
  props: ["data"],
  computed: {
    own() {
      return User.own(this.data.user_id);
    },
    messageBody() {
      return md.parse(this.data.reply);
    }
  },
  methods: {
      destroy
  }
};
</script>

<style>
</style>