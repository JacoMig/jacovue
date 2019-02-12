import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import About from './views/About.vue'
import Portfolio from './views/Portfolio.vue'
import Contact from './views/Contact.vue'
import Detail from './views/Detail.vue'
import NotFound from './views/NotFound.vue'
import Coding from './views/Coding.vue'


Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    {
      path: '/portfolio',
      name: 'portoflio',
      component: Portfolio
    },
    {
      path: '/detail/:id',
      name: 'detail',
      component: Detail
    },
    {
      path: '/contact',
      name: 'contact',
      component: Contact
    },
    {
      path: '/coding',
      name: 'coding',
      component: Coding
    },
    {
      path: '/404',
      name: 'notfound',
      component: NotFound
    }
  ]
})
