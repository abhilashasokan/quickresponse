<template>
  <div v-if="question">
    <modify v-if="editing" :questionObject="question"></modify>
    <show-question :questionObject="question" v-else></show-question>  
  </div>
</template> 

<script>
import ShowQuestion from "./ShowQuestion";
import modify from "./modify";
export default {
  components: { ShowQuestion, modify },
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
