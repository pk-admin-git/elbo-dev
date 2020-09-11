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

    /* Übersicht Projekte */
    ProjectItems: [],

    /* Übersicht */
    DocuCategoryItems: [],
    DocuObjectItems: [],
    DocuFloorItems: [],
    DocuRoomItems: [],
    CableListItems: [],

    /* Dokumentation */
    CableListElements: [],

    /* Leistungsverzeichnis */
    SpecItems: [],

    /* Aufmaß */
    Measurments: [],
    oldCurrentMsr: '',
    newCurrentMsr:'',

    /* Selektionen, Status */
    CategorySelected: false,
    ActiveCategory: '',
    ActiveObject: '',
    ActiveFloor: '',
    ActiveCableList: '',
    
};

const mutations = {

    /* Projekte */
    UPDATE_PROJECT_ITEMS(state, payload){
        state.ProjectItems = payload;
    },
    UPDATE_NEW_PROJECT_ITEM(state, payload){
        state.ProjectItems.push(payload);
    },

    /* Leistungsverzeichnis */

    UPDATE_SPEC_ITEMS(state, payload) {
        state.SpecItems = payload
    },
    NEW_SPEC_ITEM(state, payload) {
        state.SpecItems.push(payload);
    },
    
    /* Übersicht Kategorien */
    UPDATE_DOCU_CATEGORY_ITEMS(state, payload){
        state.DocuCategoryItems = payload;
    },
    UPDATE_NEW_DOCU_CATEGORY_ITEM(state, payload){
        state.DocuCategoryItems.push(payload);
    },
    UPDATE_ACTIVE_CATEGORY(state, payload){
        state.ActiveCategory = payload;
    },
    UPDATE_CATEGORY_SELECTED(state, payload){
        state.CategorySelected = payload;
    },

    /* Übersicht Gebäude */
    UPDATE_DOCU_OBJECT_ITEMS(state, payload){
        state.DocuObjectItems = payload;
    },
    UPDATE_NEW_DOCU_OBJECT_ITEM(state, payload){
        state.DocuObjectItems.push(payload);
    },
    UPDATE_ACTIVE_OBJECT(state, payload){
        state.ActiveObject = payload;
    },

    /* Übersicht Etagen */
    UPDATE_DOCU_FLOOR_ITEMS(state, payload){
        state.DocuFloorItems = payload;
    },
    UPDATE_NEW_DOCU_FLOOR_ITEM(state, payload){
        state.DocuFloorItems.push(payload);
    },
    UPDATE_ACTIVE_FLOOR(state, payload){
        state.ActiveFloor = payload;
    },

    /* Übersicht Räume */
    UPDATE_DOCU_ROOM_ITEMS(state, payload){
        state.DocuRoomItems = payload;
    },
    UPDATE_NEW_DOCU_ROOM_ITEM(state, payload){
        state.DocuRoomItems.push(payload);
    },

    /* Übersicht Kabelzuglisten */
    UPDATE_CABLE_LIST_ITEMS(state, payload){
        state.CableListItems = payload;
    },
    UPDATE_NEW_CABLE_LIST_ITEM(state, payload){
        state.CableListItems.push(payload);
    },
    UPDATE_ACTIVE_CABLELIST(state, payload){
        state.ActiveCableList = payload;
    },

    /* Dokumentation Kabelzugliste */
    UPDATE_CABLE_LIST_ELEMENTS(state, payload){
        state.CableListElements = payload;
    },
    UPDATE_NEW_CABLE_LIST_ELEMENT(state, payload){
        state.CableListElements.push(payload);
    },

    /* Aufmass */
    UPDATE_MEASURMENTS(state, payload){
        state.Measurments = payload;
    },
    UPDATE_NEW_MEASURMENTS(state, payload){
        state.Measurments.push(payload);
    },
    UPDATE_CURRENT_MEASURMENT(state, oldCurrentMsr, newCurrentMsr){
        state.oldCurrentMsr = oldCurrentMsr
        state.newCurrentMsr = newCurrentMsr
    }
};

const actions = {


    /* Übersicht Kategorien */

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
    },
    setActiveCategory({commit}, activeCategory){
        commit('UPDATE_ACTIVE_CATEGORY', activeCategory)
    },
    setCategorySelected({commit}, categoryId){
        commit('UPDATE_CATEGORY_SELECTED', categoryId)
    },

    /* Leistungsverzeichnis */

    getSpecItems({ commit }, projectId) {
        axios.get('http://46.101.114.150/api/project/' + projectId + '/specification', axiosConfig)
            .then((response) => {
                commit('UPDATE_SPEC_ITEMS', response.data)
            });
    },
    addNewSpecItem({ commit}, payload) {
        axios.post('http://46.101.114.150/api/specifications', payload)
        .then((response) => {
            commit('NEW_SPEC_ITEM', response.data)
        });
    }, 


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

    /* Übersicht Gebäude */
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

    /* Übersicht Etagen */
    getDocuFloorItems({ commit }, projectId){
        axios.get('http://46.101.114.150/api/project/' + projectId + '/docuFloors', axiosConfig)
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

    /* Übersicht Räume */
    getDocuRoomItems({ commit }, projectId){
        axios.get('http://46.101.114.150/api/project/' + projectId + '/docuRooms', axiosConfig)
            .then((response) => {
                commit('UPDATE_DOCU_ROOM_ITEMS', response.data)
            });
    },
    addNewDocuRoom({ commit }, payload){
        axios.post('http://46.101.114.150/api/docuRooms', payload)
            .then((response) => {
                commit('UPDATE_NEW_DOCU_ROOM_ITEM', response.data);
            });
    },

    /* Übersicht Kabelzuglisten */
    getCableListItems({ commit }, projectId){
        axios.get('http://46.101.114.150/api/project/' + projectId + '/cableLists', axiosConfig)
            .then((response) => {
                commit('UPDATE_CABLE_LIST_ITEMS', response.data)
            });
    },
    addNewCableList({ commit }, payload){
        axios.post('http://46.101.114.150/api/cableLists', payload)
            .then((response) => {
                commit('UPDATE_NEW_CABLE_LIST_ITEM', response.data);
            });
    },
    setActiveCableList({commit}, activeCableList){
        commit('UPDATE_ACTIVE_CABLELIST', activeCableList)
    },

    /* Dokumentation Kabelzugliste */

    getCableListElements({commit}, [projectId, cableListId]){
        axios.get('http://46.101.114.150/api/project/' + projectId + '/cableLists/' + cableListId + '/cableListElements', axiosConfig)
            .then((response) => {
                commit('UPDATE_CABLE_LIST_ELEMENTS', response.data)
            });
    },
    addNewCableListElement({ commit }, payload){
        axios.post('http://46.101.114.150/api/cableListElements', payload)
            .then((response) => {
                commit('UPDATE_NEW_CABLE_LIST_ELEMENT', response.data);
            });
    },

    /* Aufmaß */
    getMeasurments({commit}, projectId){
        axios.get('http://46.101.114.150/api/project/' + projectId + '/measurments', axiosConfig)
            .then((response) => {
                commit('UPDATE_MEASURMENTS', response.data)
            });
    },
    addNewMeasurment({ commit }, payload){
        axios.post('http://46.101.114.150/api/measurments', payload)
            .then((response) => {
                commit('UPDATE_NEW_MEASURMENTS', response.data);
            });
    },
    setCurrentMeasurment(measurmentId, payload){
        axios.post('http://46.101.114.150/api/measurment/' + measurmentId, payload)
            .then(response => {
            console.log(response.data)
            })
    },
};

const getters = {

    /* Aktive Elemente */
    DocuCategories: state => state.DocuCategoryItems,
    ActiveCategory: state => state.ActiveCategory,
    CategorySelected: state => state.CategorySelected,

    /* Projekte */
    ProjectItems: state => state.ProjectItems,
    ProjectItemById: state => id => state.ProjectItems.find(ProjectItem => ProjectItem.id === id ),
    
    /* LV */
    SpecItems: state => state.SpecItems,
    SpecItemsLength: state => state.SpecItems.length,

    /* Übersicht Gebäude */
    DocuObjects: state => state.DocuObjectItems,
    ActiveObject: state => state.ActiveObject,
    
    /* Übersicht Etagen */
    DocuFloors: state => state.DocuFloorItems,
    DocuFloorsFiltered: state => objectId => state.DocuFloorItems.filter(floors => floors.DocuObjectId === objectId),
    ActiveFloor: state => state.ActiveFloor,

    /* Übersicht Räume */
    DocuRoomsFiltered: state => floorId => state.DocuRoomItems.filter(rooms => rooms.DocuFloorId === floorId),

    /* Übersicht Kabelzuglisten */
    CableLists: state => state.CableListItems,
    ActiveCableList: state => state.ActiveCableList,

    /* Dokumentation Kabelzugliste */
    CableListById: state => cableListId => state.CableListItems.find(CableListItem => CableListItem.id === cableListId),
    CableListElements: state => state.CableListElements,
    CableListElementsLength: state => state.CableListElements.length,

    /* Aufmaß */
    Measurments: state => state.Measurments,
    MeasurmentsLength: state => state.Measurments.length,
    CurrentMeasurment: state => state.Measurments.find(measurment => measurment.Current == 1)
    
};

const projectsModul = {
    state,
    mutations,
    actions,
    getters,
}

export default projectsModul;