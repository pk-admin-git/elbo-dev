import axios from 'axios';
/* axios.defaults.baseURL = 'http://46.101.114.150/api' */
let axiosConfig = {
    headers: {
        "Content-Type": "Content-Type: application/json",
        "X-Metabase-Session": "id",
        "Access-Control-Allow-Origin": "*",
    }
}

const state = {
    ProjectItems: [],
    
};

const mutations = {
    UPDATE_PROJECT_ITEMS(state, payload){
        state.ProjectItems = payload;
    },
    UPDATE_DOCU_OBJECT_ITEMS(state, payload){
        state.ProjectItems = payload;
    }
};

const actions = {
    getProjectItems({ commit }){
        axios.get('http://46.101.114.150/api/projects', axiosConfig)
            .then((response) => {
                commit('UPDATE_PROJECT_ITEMS', response.data)
            });
    },
    addNewProject({ commit }, payload){
        axios.post('http://46.101.114.150/api/projects', payload)
            .then((response) => {
                commit('UPDATE_PROJECT_ITEMS', response.data);
            });
    },
    getDocuObjectItems({ commit }){
        axios.get('http://46.101.114.150/api/docuObjects', axiosConfig)
            .then((response) => {
                commit('UPDATE_PROJECT_ITEMS', response.data)
            });
    },
    addNewDocuObject({ commit }, payload){
        axios.post('http://46.101.114.150/api/projects', payload)
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