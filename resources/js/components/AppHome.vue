<template>
  <div>
    <toolbar></toolbar>
    <!-- component matched by the route will render here -->
    <router-view></router-view>
    <!-- <app-login></app-login> -->
    <app-footer></app-footer>
  </div>
</template>

<script>
import toolbar from "./Toolbar";
import AppFooter from "./AppFooter";
import AppLogin from './login/Login';
export default {
  components: { toolbar, AppFooter, AppLogin }
};
</script>

<style>
</style>
