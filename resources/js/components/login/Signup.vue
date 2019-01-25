<template>
  <v-container>
    <v-form @submit.prevent="signup" method="POST">
      <v-text-field v-model="form.name" type="text" label="Name" required></v-text-field>  
      <v-text-field v-model="form.email" type="email" label="E-mail" required></v-text-field>
      <v-text-field v-model="form.password" type="password" label="Password" required></v-text-field>
      <v-text-field v-model="form.password_confirmation" type="password" label="Password" required></v-text-field>
      <v-btn color="green" type="submit">Sign Up</v-btn>
      <router-link to="/login">
        <v-btn color="blue">Login</v-btn>
      </router-link>
    </v-form>
  </v-container>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        };
    },
    methods: {
       signup() {
           console.log('Sign Up confirmation');
           axios.post('/api/auth/signup', this.form)
           .then(res => User.responseAfterLogin(res))
           .catch(function(error){
               console.log(error)
           })
           .then(function () {
                console.log('Signup process completed');
           });
       }
    }
};
</script>

<style>

</style>
