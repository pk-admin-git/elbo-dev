import Vue from 'vue'
import Vuex from 'vuex'

//Module
import projects from './modules/projects/index.js';
import users from './modules/users/index.js'

Vue.use(Vuex);

export default new Vuex.Store({
    
    modules: {
        projects,
        users
    }

})