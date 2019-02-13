<template>
  <div>
    <v-btn icon @click="likedIt">
      <v-icon :color="color">favorite</v-icon>
      {{count}}
    </v-btn>
  </div>
</template>

<script>
export default {
  props: ["content"],
  data() {
    return {
      liked: this.content.liked,
      count: this.content.like_count
    };
  },
  computed: {
      color() {
          return this.liked ? 'red' : 'red lighten-4';
      }
  },
  methods: {
    likedIt() {
      if (User.loggedIn()) {
        this.liked ? this.decr() : this.incr();
        this.liked = !this.liked;
      }
    },
    incr() {
      axios
        .post(`/api/like/${this.content.id}`)
        .then(res => this.count++)
        .catch(error => console.log(error.response.data));
    },
    decr() {
      axios
        .delete(`/api/like/${this.content.id}`)
        .then(res => this.count--)
        .catch(error => console.log(error.response.data));
    }
  }
};
</script>

<style>
</style>
