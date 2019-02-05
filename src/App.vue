<template>
  <div id="app">
    <header>
      <div class="logo">
       <router-link to="/">
          <h1>Jacopo</h1>
          <h1>Migliorelli</h1>
        </router-link>
      </div>
     <div class="mobile-toggle" @click="toggleOpen">
        <span></span>
      </div>
      <div id="nav">
        <Navigation />
      </div>
      <div id="nav__mobile">
        <Navigation />
      </div>
    </header>
    <div class="content">
      <transition name="fade" mode="out-in">
        <keep-alive>
          <router-view/>
        </keep-alive>
      </transition>
    </div>
    <Footer />
  </div>
</template>

<script>

import Footer from '@/components/Footer.vue'
import Navigation from '@/components/Navigation.vue'

export default {
  components: {
    Footer, Navigation
  },
  methods: {
    toggleOpen(event){
      const toggle =  document.querySelector('.mobile-toggle')
      toggle.classList.toggle('open')
      document.querySelector('#nav__mobile').classList.toggle('open')
      /* document.querySelector('#nav').classList.toggle('close') */
    }
  },
  watch: {
    '$route' (to, from) {
       document.querySelector('#nav__mobile').classList.remove('open')
       document.querySelector('.mobile-toggle').classList.remove('open')
    }
  }
  
}
</script>


<style scoped>
.fade-enter-active{
  transition: opacity 0.5s
}
.fade-enter, .fade-leave{
  opacity: 0;
}
</style>


