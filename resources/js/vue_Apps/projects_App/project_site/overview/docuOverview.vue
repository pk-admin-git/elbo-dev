<template>
<div>
    <v-card class="p-3">
        <v-card-title>Überblick</v-card-title>    
        <v-row no-gutters>    

            <!-- Kategorien -->
            <overviewCategoryElement :projectId="projectId"/>

            <!-- Gebäude -->
            <overviewObjectElement :projectId="projectId"/>

            <!-- Etagen -->
            <overviewFloorElement :projectId="projectId"/>

            <!-- Räume -->
            <overviewRoomElement :projectId="projectId"/>

        </v-row>
    </v-card>

</div>   
</template>

<script>
import overviewCategoryElement from './overviewCategoryElement.vue'
import overviewObjectElement from './overviewObjectElement.vue'
import overviewFloorElement from './overviewFloorElement.vue'
import overviewRoomElement from './overviewRoomElement.vue'

export default {
    name: 'docuOverview',
    props: [
                   
        ],
        data() {
            return {
            }
        },
        components: {
            overviewCategoryElement,
            overviewObjectElement,
            overviewFloorElement,
            overviewRoomElement,
        },
        created() {
            this.$store.dispatch('getDocuObjectItems', this.projectId)

            this.$store.dispatch('getDocuFloorItems', this.projectId)

            this.$store.dispatch('getDocuRoomItems', this.projectId)
            
            this.$store.dispatch('getDocuCategoryItems', this.projectId)

            this.$store.dispatch('getCableListItems', this.projectId)
            
        },
        computed: {
            projectId() {
                return this.$route.params.projectId
            }
            
        },
        methods: {
            
        }
}
</script>