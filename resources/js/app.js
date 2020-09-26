require('./bootstrap');
window.Vue = require('vue');
Vue.use(VueRouter)
Vue.use(Vuetify)

//Vuetify
import Vuetify from 'vuetify/lib'
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import '@mdi/font/css/materialdesignicons.css'
const opts = {
    defaultAssets: {
        font: true,
        icons: 'md'
      },
      icons: {
        iconfont: 'mdi',
      }
}

//Vue Router
import VueRouter from 'vue-router'

//ProjectsApp
import { projectRoutes } from './vue_routes/routes'
import store from './vuex_store/ProjectsVuex.js'



//SPA
import appContainer from './vue SPA/app-Container.vue'
Vue.component('app-Container', appContainer);


const projectRouter = new VueRouter({
    mode: 'history',
    routes: projectRoutes,
})


let SPA = new Vue({
    store,
    router: projectRouter,
    vuetify: new Vuetify(opts),
    el: '#appContainer',
    components: {
        appContainer
    }
})


let projects = new Vue({
    store,
    el: '#projectApp',
    router: projectRouter,
}); 

/* let shiftplan = new Vue({
    render: h => h(shiftplanApp),
}).$mount('#shiftplanApp'); */

