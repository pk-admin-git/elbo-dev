import projectsNav from '../vue_Apps/projects_App/projectsAll-site/projectsNav.vue'
import activeProjectsList from '../vue_Apps/projects_App/projectsAll-site/active_projects/activeProjectsList.vue'
import projectNav from '../vue_Apps/projects_App/project_site/projectNav.vue'
import projectOverview from '../vue_Apps/projects_App/project_site/overview/projectOverview.vue'
import projectSpecification from '../vue_Apps/projects_App/project_site/specification/projectSpecification.vue'
import measurment from '../vue_Apps/projects_App/project_site/measurment/measurment.vue'
import docu from '../vue_Apps/projects_App/project_site/docu/docu.vue'
import CableListOverview from '../vue_Apps/projects_App/project_site/docu/overviewCableListElement.vue'
import DocuCableListV2 from '../vue_Apps/projects_App/project_site/cableList-v2/docucableList-v2.vue'

import users from '../vue_Apps/users/users.vue'
import usersOverview from '../vue_Apps/users/usersOverview.vue'
import usersNav from '../vue_Apps/users/usersNav.vue'
import userRoles from '../vue_Apps/users/userRoles.vue'
import userPermissions from '../vue_Apps/users/userPermissions.vue'


export const routes = [
    {
        path: '/elboApp/projects/activeProjects',
        components: { 
            navTab: projectsNav,
            content: activeProjectsList
        },
        props: {navTab: true, content: true}, 
    },
    {    
        path: '/elboApp/project/:projectId/projectOverview',
        components: {
            navTab: projectNav,
            content: projectOverview
        },
        props: {navTab: true, content: true}, 
    },
    {    
        path: '/elboApp/project/:projectId/projectSpecification',
        components: {
            navTab: projectNav,
            content: projectSpecification
        },
        props: {navTab: true, content: true},
    },
    {    
        path: '/elboApp/project/:projectId/projectDocu',
        components: {
            navTab: projectNav,
            content: docu
        },
        props: {navTab: true, content: true},
        children: [
            {
            path: '',
            components: {
                docu: CableListOverview
                },
                props: {docu: true},
            },
            {    
            path: 'section/:cableListId',
            components: {
                docu: DocuCableListV2
                },
                props: {docu: true},
            },
        ]
    },
    {
    path: '/elboApp/project/:projectId/measurment',
        components: {
            navTab: projectNav,
            content: measurment
        },
        props: {navTab: true, content: true},
    },


//Users
    {
        path: '/elboApp/users',
        components: { 
            navTab: usersNav,
            content: users
            },
        props: {navTab: true, content: true}, 
            children: [    
                {
                path: 'overview',
                components: { 
                    users: usersOverview
                    },
                props: {users: true}, 
                },
                {    
                path: 'roles',
                components: { 
                    users: userRoles
                    },
                props: {users: true}, 
                },
                {    
                path: 'permissions',
                components: { 
                    users: userPermissions
                    },
                props: {users: true}, 
                },
            ]
    },
]

