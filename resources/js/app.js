require('./bootstrap');
window.Vue = require('vue');

//ProjectsApp
import VueRouter from 'vue-router'
import { projectRoutes } from './vue_routes/routes'
import store from './vuex_store/ProjectsVuex.js'

Vue.use(VueRouter)


const projectRouter = new VueRouter({
    mode: 'history',
    routes: projectRoutes,
})


let projects = new Vue({
    store,
    el: '#projectApp',
    router: projectRouter,
}); 

/* let shiftplan = new Vue({
    render: h => h(shiftplanApp),
}).$mount('#shiftplanApp'); */



Vue.directive('click-outside', {
    bind: function (el, binding, vnode) {
      el.clickOutsideEvent = function (event) {
        // here I check that click was outside the el and his children
        if (!(el == event.target || el.contains(event.target))) {
          // and if it did, call method provided in attribute value
          vnode.context[binding.expression](event);
        }
      };
      document.body.addEventListener('click', el.clickOutsideEvent)
    },
    unbind: function (el) {
      document.body.removeEventListener('click', el.clickOutsideEvent)
    },
  });
