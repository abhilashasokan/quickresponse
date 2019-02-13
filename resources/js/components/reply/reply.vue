<template>
  <div class="mt-2">
    <v-card>
      <v-card-title>
        <div class="headline">{{data.user}}</div>
        <div class="ml-2">Said {{data.created_at}}</div>
        <v-spacer></v-spacer>
        <like :content="data"></like>
      </v-card-title>
      <v-divider></v-divider>

      <edit-reply v-if="editing" :reply="data"></edit-reply>
      <v-card-text v-else v-html="messageBody"></v-card-text>

      <v-divider></v-divider>
      <div v-if="!editing">
        <v-card-actions v-if="own">
          <v-btn icon small @click="editMessage">
            <v-icon>edit_location</v-icon>
          </v-btn>
          <v-btn icon small @click="destroy">
            <v-icon>delete_outline</v-icon>
          </v-btn>
        </v-card-actions>
      </div>
    </v-card>
  </div>
</template>

<script>
import editReply from "./editReply";
import Like from "../likes/like";
export default {
  props: ["data", "index"],
  components: { editReply, Like },
  data() {
    return {
      editing: false
    };
  },
  computed: {
    own() {
      return User.own(this.data.user_id);
    },
    messageBody() {
      return md.parse(this.data.reply);
    }
  },
  created() {
    this.listen();
  },
  methods: {
    destroy() {
      EventBus.$emit("deleteReply", this.index);
    },
    editMessage() {
      this.editing = true;
    },
    listen() {
      EventBus.$on("cancelReplyEditing", () => {
        this.editing = false;
      });
    }
  }
};
</script>

<style>
</style>