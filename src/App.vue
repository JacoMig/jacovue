<template>
  <div id="app" :class="pathName">
    <vue-title title="Jacopo Migliorelli - Frontend Development / Webdesign"></vue-title>
    <header v-if="page">
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
    <transition name="fade" mode="out-in">
    <Footer v-if="page"/>
    </transition>
  </div>
</template>

<script>

import Footer from '@/components/Footer.vue'
import Navigation from '@/components/Navigation.vue'


export default {
  data(){
    return{
      pathName : this.$route.name,
      page: false
    }
  },
  components: {
    Footer, Navigation
  },
  created(){
     if(this.pathName === "home")
     this.page = false
     else
     this.page = true
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
      this.pathName = to.name
      if(this.pathName === "home")
        this.page = false
      else
        this.page = true
      document.title = to.name.charAt(0).toUpperCase()+ to.name.substring(1)+' - Jacopo Migliorelli - Frontend Development / Webdesign';
      const navMobile = document.querySelector('#nav__mobile');
      const toggleMobile = document.querySelector('.mobile-toggle');
      if(navMobile)
        navMobile.classList.remove('open')
      if(toggleMobile)
        toggleMobile.classList.remove('open')
        
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


