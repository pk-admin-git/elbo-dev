<template>   
<div>
    <div class="row col-12 mt-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewProjectForm">Neues Projekt</button>
    </div>

    <div class="modal fade" id="NewProjectForm" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <new-project-form/>
    </div>

    <div class="row row-cols-md-3 row-cols-sm-2">
        
        <projectsListItem  v-for="ProjectItem in ProjectItems" 
                            :key="ProjectItem.id"
                            :ProjectItem="ProjectItem"/>
        
    </div>
    
</div>
</template>

<script>
    import projectsListItem from './projectsListItem.vue'
    import NewProjectForm from './NewProjectForm.vue'

    export default {
        name: 'activeProjectsList',
        components: {
            projectsListItem,
            NewProjectForm
        },
        data: function() {
            return {
                projectActive: false,
            }
        },
        created() {
            this.$store.dispatch('getProjectItems');
        },
        computed: {
            ProjectItems() {
                return this.$store.getters.ProjectItems;
            }
        },
    }
</script>

<style lang="scss">

.card-project {
    @import '@/_variables.scss';
    
    margin-top: 20px;
    z-index: 10;
    cursor: pointer;
    
}
.prActive {
    border: solid black;
}

</style>