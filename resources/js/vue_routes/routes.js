import projectsNav from '../vue_Apps/projects_App/projectsAll-site/projectsNav.vue'
import activeProjectsList from '../vue_Apps/projects_App/projectsAll-site/active_projects/activeProjectsList.vue'
import projectNav from '../vue_Apps/projects_App/project_site/projectNav.vue'
import projectOverview from '../vue_Apps/projects_App/project_site/overview/projectOverview.vue'
import projectSpecification from '../vue_Apps/projects_App/project_site/specification/projectSpecification.vue'
import DocuOverview from '../vue_Apps/projects_App/project_site/docu/docuOverview.vue'
import measurment from '../vue_Apps/projects_App/project_site/measurment/measurment.vue'
import docu from '../vue_Apps/projects_App/project_site/docu/docu.vue'
import DocuCableListV2 from '../vue_Apps/projects_App/project_site/cableList-v2/docucableList-v2.vue'


export const projectRoutes = [
    {
        path: '/projectApp/projects/activeProjects',
        components: { 
            navTab: projectsNav,
            content: activeProjectsList
        },
        props: {navTab: true, content: true}, 
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
        path: '/projectApp/project/:projectId/projectDocu',
        components: {
            navTab: projectNav,
            content: docu
        },
        props: {navTab: true, content: true},
        children: [
            {
            path: '',
            components: {
                docu: DocuOverview
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
    path: '/projectApp/project/:projectId/measurment',
        components: {
            navTab: projectNav,
            content: measurment
        },
        props: {navTab: true, content: true},
    },
]