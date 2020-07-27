import axios from 'axios';
axios.defaults.baseURL = 'http://46.101.114.150/api'
/* axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*'; */

const state = {
    ProjectItems: [],
    
};

const mutations = {
    UPDATE_PROJECT_ITEMS(state, payload){
        state.ProjectItems = payload;
    }
};

const actions = {
    getProjectItems({ commit }){
        axios.get('/projects')
            .then((response) => {
                commit('UPDATE_PROJECT_ITEMS', response.data)
            });
    },
    addNewProject({ commit }, payload){
        axios.post('/projects', payload)
            .then((response) => {
                commit('UPDATE_PROJECT_ITEMS', response.data);
            });
    }
};

const getters = {
    ProjectItems: state => state.ProjectItems,
    ProjectItemById: state => id => state.ProjectItems.find(ProjectItem => ProjectItem.id === id ),
};

const projectsModul = {
    state,
    mutations,
    actions,
    getters,
}

export default projectsModul;