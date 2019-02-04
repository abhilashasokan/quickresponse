<template>
  <div class="mt-4">
    <markdown-editor v-model="body" ref="markdownEditor"></markdown-editor>
    <v-btn color="green" dark @click="submit">Reply</v-btn>
  </div>
</template>

<script>
export default {
    props: ['questionSlug'],
    data() {
        return {
            body:null
        }
    },
    methods: {
        submit() {
            axios.post(`/api/questions/${this.questionSlug}/reply`, {body: this.body} )
            .then(res => {
                this.body = ''
                EventBus.$emit('newReplyCreated', res.data.reply)
                window.scrollTo(0,0)
            })
            .catch(error => console.log(error.response));
        }
    }
};
</script>

<style>
</style>
 