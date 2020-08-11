<template>
    <div>
       <ul class="nav nav-tabs">
            <li class="nav-item">
                <router-link :to="'/projectApp/project/'+ ProjectItem.id +'/projectOverview'" 
                class="nav-link active" data-toggle="tab">Übersicht</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="'/projectApp/project/'+ ProjectItem.id +'/projectSpecification'" 
                class="nav-link" data-toggle="tab">LV</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="'/projectApp/project/'+ ProjectItem.id +'/projectDocu/DocuOverview'"
                class="nav-link" data-toggle="tab">Docu</router-link> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Arbeitsnachweise</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Aufmaß</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pläne</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Todo's</a>
            </li>
        </ul> 
    </div>
</template>

<script>
export default {
    name: 'projectNav',
    props: [
        'projectId',
    ],
    
    created() {
        this.$store.dispatch('getProjectItems');
    },

    computed: {
        ProjectItem() {
            return (this.$store.getters.ProjectItemById(Number(this.projectId)));
        }
    },
    
}
</script>

<style lang="scss" scoped>

</style>