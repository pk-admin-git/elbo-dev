import projectsNav from '../vue_Apps/projects_App/projectsAll-site/projectsNav.vue'
import activeProjectsList from '../vue_Apps/projects_App/projectsAll-site/active_projects/activeProjectsList.vue'
import projectNav from '../vue_Apps/projects_App/project_site/projectNav.vue'
import projectOverview from '../vue_Apps/projects_App/project_site/overview/projectOverview.vue'
import projectSpecification from '../vue_Apps/projects_App/project_site/specification/projectSpecification.vue'
import projectDocu from '../vue_Apps/projects_App/project_site/docu/projectDocu.vue'

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
        path: '/projectApp/project/:projectId/projectDocu',
        components: {
            navTab: projectNav,
            content: projectDocu
        },
        props: {navTab: true, content: true},
    }
]