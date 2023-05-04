<template>
  <div>
    <!-- Banner Video -->
    <div class="banner" />

    <!-- Jumbotron -->
    <posts-jumbotron />

  </div>
</template>

<script>
import PostsJumbotron from './components/PostsJumbotron.vue'

export default {
  components: {
    PostsJumbotron
  }
}
</script>

<style scoped>
.banner {
  width: 100vw;
  height: 450px;
  background-image: url('https://lh3.googleusercontent.com/pw/AL9nZEVlJmcM4XpgW-XUTFmKz01qXwXcUR3sNeI3NilehIvikSsXZqIGNpFufjoMiaZEJUwFaYutikjn-TIJ85mDs8G54EccMBjz_xZrMC6WzBXZh1PkyHfCPnCSM2uvhbjMo5_uWTk5FHv31Ou9KzXnvQ_q=w1440-h538-no?authuser=0');
  background-position: center;
  background-repeat: no-repeat;
  background-size: 100%;
}
</style>