<template>
    <div>
        <reply v-for="(reply, index) in content" 
        :data="reply" 
        :key="reply.id" 
        :index=index
        v-if="question"></reply>
    </div>
</template>

<script>
import Reply from './reply'
export default {
    props: ['question'],
    data() {
        return{
            content: this.question.replies
        }
    },
    components: {Reply},
    created() {
        this.listen()
    },
    methods: {
        listen() {
            EventBus.$on('newReplyCreated', (reply)=> {
                this.content.unshift(reply)
            })

            EventBus.$on('deleteReply', (index)=> {
                axios.delete(`/api/questions/${this.question.slug}/reply/${this.content[index].id}`)
                .then(res => {
                    console.log(res.data.data)
                    this.content.splice(index,1)
                })
                .catch(error => console.log(error.response.data));
                
            })
            
        }
    }
}
</script>

<style>

</style>
