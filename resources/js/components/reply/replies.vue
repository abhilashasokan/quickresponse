<template>
    <div>
        <reply v-for="reply in replies" :data="reply" :key="reply.id" v-if="replies"></reply>
    </div>
</template>

<script>
import Reply from './reply'
export default {
    props: ['replies'],
    data() {
        return{
            content: this.replies
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
        }
    }
}
</script>

<style>

</style>
