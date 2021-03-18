<template>
    <v-tabs dark show-arrows>
        <v-tabs-slider color="teal lighten-3"></v-tabs-slider>
        <v-tab :to="'/elboApp/project/'+ projectId +'/projectOverview'">
            Übersicht
        </v-tab>
        <v-tab :to="'/elboApp/project/'+ projectId +'/projectSpecification'">
            LV
        </v-tab>
        <v-tab :to="'/elboApp/project/'+ projectId +'/projectDocu'">
            Doku
        </v-tab>
       <!--  <v-tab :to="'/elboApp/project/'+ projectId +'/projectOverview'">
            Arbeitsnachweise
        </v-tab> -->
        <v-tab :to="'/elboApp/project/' + projectId + '/measurment'">
            Aufmaß
        </v-tab>
        <!-- <v-tab :to="'/elboApp/project/'+ projectId +'/projectOverview'">
            TODOs
        </v-tab> -->
    </v-tabs>
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