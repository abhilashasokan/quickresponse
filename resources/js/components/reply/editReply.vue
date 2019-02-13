<template>
  <div class="mt-4">
    <markdown-editor v-model="reply.reply" ref="markdownEditor"></markdown-editor>
    <v-card-actions>
      <v-btn icon small @click="updateReply">
        <v-icon color="green">save</v-icon>
      </v-btn>
      <v-btn icon small @click="cancelReplyEditing">
        <v-icon color="black">cancel</v-icon>
      </v-btn>
    </v-card-actions>
  </div>
</template>

<script>
export default {
  props: ["reply"],
  data() {
    return {
      body: null
    };
  },
  methods: {
    updateReply() {
      axios
        .patch(`/api/questions/${this.reply.question_slug}/reply/${this.reply.id}`, {body: this.reply.reply})
        .then(res => {
            this.cancelReplyEditing();
        })
        .catch(error => console.log(error.response));
    },
    cancelReplyEditing() {
        EventBus.$emit("cancelReplyEditing");
    }
  }
};
</script>

<style>
</style>
 