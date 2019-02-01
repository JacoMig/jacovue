import Vue from 'vue'
import App from './App.vue'
import router from './router'
import NProgress from 'nprogress';
import "../src/assets/css/style.scss"
import '../node_modules/nprogress/nprogress.css'

Vue.config.productionTip = false

router.beforeResolve((to, from, next) => {
  if (to.name) {
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  NProgress.done()
})

new Vue({
  router,
  render: function (h) { return h(App) }
}).$mount('#app')
