<template>
  <v-container>
    <v-form @submit.prevent="login" method="POST">
      <v-text-field v-model="form.email" type="email" label="E-mail" required></v-text-field>
      <span class="red--text" v-if="errors.email">{{errors.email}}</span>
      <v-text-field v-model="form.password" type="password" label="Password" required></v-text-field>
      <span class="red--text" v-if="errors.password">{{errors.password}}</span>
      <v-btn color="green" type="submit">Login</v-btn>
      <router-link to="/signup">
        <v-btn color="blue">Signup</v-btn>
      </router-link>
    </v-form>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null
      },
      errors: {}
    };
  },
  created() {
    if (User.loggedIn()) {
      this.$router.push({ name: "forum" });
    }
  },
  methods: {
    login() {
        User.login(this.form)
    }
  }
};
</script> 

<style>
</style>
