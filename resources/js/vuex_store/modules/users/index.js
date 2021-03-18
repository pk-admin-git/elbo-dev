import axios from 'axios';
axios.defaults.baseURL = 'http://127.0.0.1:8000/'
/* let axiosConfig = {
    headers: {
        "Content-Type": "Content-Type: application/json",
        "X-Metabase-Session": "id",
        "Access-Control-Allow-Origin": "*",
    }
} */

const state = {
    users : [],
    roles: [],
    permissions: [],

}

const mutations = {
    UPDATE_USERS(state, payload) {
        state.users = payload
    },
    UPDATE_ROLES(state, payload) {
        state.roles = payload
    },
    UPDATE_PERMISSIONS(state, payload) {
        state.permissions = payload
    },


}

const actions = {
    getUsers({ commit }) {
        axios.get('api/users')
            .then((response) => {
                commit('UPDATE_USERS', response.data)
            })
    },
    getRoles({ commit }) {
        axios.get('api/roles')
            .then((response) => {
                commit('UPDATE_ROLES', response.data)
            })
    },
    getPermissions({ commit }) {
        axios.get('api/permissions')
            .then((response) => {
                commit('UPDATE_PERMISSIONS', response.data)
            })
    }
}

const getters = {
    Users: state => state.users,
    Roles: state => state.roles,
    Permissions: state => state.permissions,
    /* PermissionsToAdd: (state,getters) => (rolePermissions) => {
        const permissionsArray = state.Permissions.filter(Permissions => Permissions === rolePermissions)
        

    }
        {const rolePermissions = getters.Roles.permissions
            state.Permissions.includes(rolePermissions)}, */

    SpecElementsByCableListElement: (state, getters) => (cableListElementId) => {
        const specItemsArray = state.DocuElements.filter(DocuElements => DocuElements.CableListElementId === cableListElementId)
                .map(item => item.SpecificationId)
        return getters.SpecItems.filter(item => specItemsArray.includes(item.id))
        },

}

const usersModul = {
    state,
    mutations,
    actions,
    getters,
}

export default usersModul;