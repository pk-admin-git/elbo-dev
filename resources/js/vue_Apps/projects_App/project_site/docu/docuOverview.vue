<template>
<div>
    <div class="text-h3 mt-5 mb-8">Dokumentation</div>
    <v-card class="p-3">    
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

    <div class="card border-0 bg-transparent">
            
            <!-- Kabelzuglisten -->
            <overviewCableListElement :projectId="projectId"/>
    </div>

</div>   
</template>

<script>
import overviewCategoryElement from './overviewCategoryElement.vue'
import overviewObjectElement from './overviewObjectElement.vue'
import overviewFloorElement from './overviewFloorElement.vue'
import overviewCableListElement from './overviewCableListElement.vue'
import overviewRoomElement from './overviewRoomElement.vue'

export default {
    name: 'docuOverview',
    props: [
            'projectId',       
        ],
        data() {
            return {
            }
        },
        components: {
            overviewCategoryElement,
            overviewObjectElement,
            overviewFloorElement,
            overviewCableListElement,
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
            
        },
        methods: {
            
        }
}
</script>