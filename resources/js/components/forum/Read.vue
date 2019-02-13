<template>
  <div v-if="question">
    <modify v-if="editing" :questionObject="question"></modify>
    <show-question :questionObject="question" v-else></show-question>  
    <v-container>
      <replies :question="question"></replies>
      <new-reply :questionSlug="question.slug"></new-reply>
    </v-container>
  </div>
</template> 

<script>
import ShowQuestion from "./ShowQuestion";
import modify from "./modify";
import Replies from "../reply/replies";
import NewReply from "../reply/newReply";
export default {
  components: { ShowQuestion, modify, Replies, NewReply },
  data() {
    return {
      question: null,
      editing: false
    };
  },
  created() {
    this.listen();
    this.getQuestions();
  },
  methods: {
    listen() {
      EventBus.$on("StartQuestionEditing", () => {
        this.editing = true;
      });
      EventBus.$on("CancelQuestionEditing", () => {
        this.editing = false;
      });
    },
    getQuestions() {
      axios
        .get(`/api/questions/${this.$route.params.slug}`)
        .then(res => (this.question = res.data.data))
        .catch(error => console.log(error.response.data));
    }
  }
};
</script>

<style>
</style>
