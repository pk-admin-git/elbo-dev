import projectsNav from '../vue_Apps/projects_App/projectsAll-site/projectsNav.vue'
import activeProjectsList from '../vue_Apps/projects_App/projectsAll-site/active_projects/activeProjectsList.vue'
import projectNav from '../vue_Apps/projects_App/project_site/projectNav.vue'
import projectOverview from '../vue_Apps/projects_App/project_site/overview/projectOverview.vue'
import projectSpecification from '../vue_Apps/projects_App/project_site/specification/projectSpecification.vue'
import DocuOverview from '../vue_Apps/projects_App/project_site/docu/docuOverview.vue'
import DocuCableList from '../vue_Apps/projects_App/project_site/cablelist/docuCableList.vue'
import measurment from '../vue_Apps/projects_App/project_site/measurment/measurment.vue'

/* Neue Vuetify-Komponenten */
import DocuCableListV2 from '../vue_Apps/projects_App/project_site/cableList-v2/docucableList-v2.vue'


export const projectRoutes = [
    {
        path: '/projectApp/projects/activeProjects',
        components: { 
            navTab: projectsNav,
            content: activeProjectsList
        }
    },
    {    
        path: '/projectApp/project/:projectId/projectOverview',
        components: {
            navTab: projectNav,
            content: projectOverview
        },
        props: {navTab: true, content: true}, 
    },
    {    
        path: '/projectApp/project/:projectId/projectSpecification',
        components: {
            navTab: projectNav,
            content: projectSpecification
        },
        props: {navTab: true, content: true},
    },
    {    
        path: '/projectApp/project/:projectId/projectDocu/DocuOverview',
        components: {
            navTab: projectNav,
            content: DocuOverview
        },
        props: {navTab: true, content: true},
    },
    {    
        path: '/projectApp/project/:projectId/projectDocu/:cableListId',
        components: {
            navTab: projectNav,
            content: DocuCableListV2
        },
        props: {navTab: true, content: true},
    },
    {
    path: '/projectApp/project/:projectId/measurment',
        components: {
            navTab: projectNav,
            content: measurment
        },
        props: {navTab: true, content: true},
    },

    /* Neue Vuetify-Componenten */
    /* {    
        path: '/projectApp/project/:projectId/projectDocu/CablelistV2/1',
        components: {
            navTab: projectNav,
            content: DocuCableListV2
        },
        props: {navTab: true, content: true},
    }, */
]