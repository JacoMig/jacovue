import Vue from 'vue'
import App from './App.vue'
import router from './router'
import NProgress from 'nprogress'
import AOS from 'aos'
import VueTitle from './components/VueTitle.vue';
import "aos/dist/aos.css"
import '../node_modules/nprogress/nprogress.css'
import "../src/assets/css/style.scss"

Vue.config.productionTip = false
Vue.component('vue-title', VueTitle);

router.beforeResolve((to, from, next) => {
  if(to.name) {
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  NProgress.done()
})

router.beforeEach((to, from, next) => {
  if (!to.matched.length) {
    next('/404');
  } else {
    if(to.name === "contact"){
       console.log('contact')
    }
    next();
  }
  
});

new Vue({
  created(){
    AOS.init();
  },
  router,
  render: function (h) { return h(App) }
}).$mount('#app')
