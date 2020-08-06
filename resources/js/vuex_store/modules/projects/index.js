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
    DocuObjectItems: [],
    DocuFloorItems: [],
    DocuCategoryItems: [],
    ActiveObject: null,
    ActiveFloor: null,
    
};

const mutations = {

    /* Projekte */
    UPDATE_PROJECT_ITEMS(state, payload){
        state.ProjectItems = payload;
    },
    UPDATE_NEW_PROJECT_ITEM(state, payload){
        state.ProjectItems.push(payload);
    },

    /* Dokumentation Gebäude */
    UPDATE_DOCU_OBJECT_ITEMS(state, payload){
        state.DocuObjectItems = payload;
    },
    UPDATE_NEW_DOCU_OBJECT_ITEM(state, payload){
        state.DocuObjectItems.push(payload);
    },
    UPDATE_ACTIVE_OBJECT(state, payload){
        state.ActiveObject = payload;
    },

    /* Dokumentation Etagen */
    UPDATE_DOCU_FLOOR_ITEMS(state, payload){
        state.DocuFloorItems = payload;
    },
    UPDATE_NEW_DOCU_FLOOR_ITEM(state, payload){
        state.DocuFloorItems.push(payload);
    },
    UPDATE_ACTIVE_FLOOR(state, payload){
        state.ActiveFloor = payload;
    },

    /* Dokumentation Kategorien */
    UPDATE_DOCU_CATEGORY_ITEMS(state, payload){
        state.DocuCategoryItems = payload;
    },
    UPDATE_NEW_DOCU_CATEGORY_ITEM(state, payload){
        state.DocuCategoryItems.push(payload);
    }
};

const actions = {

    /* Projekte */
    getProjectItems({ commit }){
        axios.get('http://46.101.114.150/api/projects', axiosConfig)
            .then((response) => {
                commit('UPDATE_PROJECT_ITEMS', response.data)
            });
    },
    addNewProject({ commit }, payload){
        axios.post('http://46.101.114.150/api/projects', payload)
            .then((response) => {
                commit('UPDATE_NEW_PROJECT_ITEM', response.data);
            });
    },

    /* Dokumentation Gebäude */
    getDocuObjectItems({ commit }, id){
        axios.get('http://46.101.114.150/api/project/' + id + '/docuObjects', axiosConfig)
            .then((response) => {
                commit('UPDATE_DOCU_OBJECT_ITEMS', response.data)
            });
    },
    addNewDocuObject({ commit }, payload){
        axios.post('http://46.101.114.150/api/docuObjects', payload)
            .then((response) => {
                commit('UPDATE_NEW_DOCU_OBJECT_ITEM', response.data);
            });
    },
    setActiveObject({commit}, activeObject){
        commit('UPDATE_ACTIVE_OBJECT', activeObject)
    },

    /* Dokumentation Etagen */

    getDocuFloorItems({ commit }, [projectId, objectId]){
        axios.get('http://46.101.114.150/api/project/' + projectId + '/docuObjects/' + objectId + '/floors', axiosConfig)
            .then((response) => {
                commit('UPDATE_DOCU_FLOOR_ITEMS', response.data)
            });
    },
    addNewDocuFloor({ commit }, payload){
        axios.post('http://46.101.114.150/api/docuFloors', payload)
            .then((response) => {
                commit('UPDATE_NEW_DOCU_FLOOR_ITEM', response.data);
            });
    },
    setActiveFloor({commit}, activeFloor){
        commit('UPDATE_ACTIVE_FLOOR', activeFloor)
    },

    /* Dokumentation Kategorien */

    getDocuCategoryItems({ commit }, projectId){
        axios.get('http://46.101.114.150/api/project/' + projectId + '/docuCategories', axiosConfig)
            .then((response) => {
                commit('UPDATE_DOCU_CATEGORY_ITEMS', response.data)
            });
    },
    addNewDocuCategory({ commit }, payload){
        axios.post('http://46.101.114.150/api/docuCategories', payload)
            .then((response) => {
                commit('UPDATE_NEW_DOCU_CATEGORY_ITEM', response.data);
            });
    }
};

const getters = {
    ProjectItems: state => state.ProjectItems,
    ProjectItemById: state => id => state.ProjectItems.find(ProjectItem => ProjectItem.id === id ),
    
    DocuObjects: state => state.DocuObjectItems,
    ActiveObject: state => state.ActiveObject,
    
    DocuFloors: state => state.DocuFloorItems,
    ActiveFloor: state => state.ActiveFloor,

    DocuCategories: state => state.DocuCategoryItems,
};

const projectsModul = {
    state,
    mutations,
    actions,
    getters,
}

export default projectsModul;