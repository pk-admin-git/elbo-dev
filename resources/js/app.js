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
