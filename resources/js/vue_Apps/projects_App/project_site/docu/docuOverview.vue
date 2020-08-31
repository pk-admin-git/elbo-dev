<template>
<div>
    <h1 class="h1 mt-4">Dokumentation</h1>
    <div class="card bg-transparent mt-5">
        <div class="card-body row align-items-start p-0">
            <h3 class="h3 col-12 mt-3 mb-4">Überblick</h3>

            <!-- Kategorien -->

            <overviewCategoryElement :projectId="projectId"/>
            
            <!-- Gebäude -->

            <overviewObjectElement :projectId="projectId"/>

            <!-- Etagen -->

            <overviewFloorElement :projectId="projectId"/>

            <!-- Räume -->

            <overviewRoomElement :projectId="projectId"/>
        </div>
    </div>

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
            
            this.$store.dispatch('getDocuCategoryItems', this.projectId)

            this.$store.dispatch('getCableListItems', this.projectId)
            
        },
        computed: {
            
        },
        methods: {
            
        }
}
</script>