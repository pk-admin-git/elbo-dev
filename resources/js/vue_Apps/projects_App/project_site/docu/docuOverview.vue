<template>
<div>
    <div class="card bg-transparent">
        <div class="card-body row align-items-start p-0">
            <h3 class="h3 col-12 mt-3 mb-4">Überblick</h3>

            <!-- Kategorien -->

            <docuCategoryElement :projectId="projectId"/>
            
            <!-- Gebäude -->

            <docuObjectElement :projectId="projectId"/>

            <!-- Etagen -->

            <docuFloorElement :projectId="projectId"/>
        </div>
    </div>

    <div class="card border-0 bg-transparent">
            <!-- Kabelzuglisten -->
            <cableLists/>
    </div>

</div>   
</template>

<script>
import docuCategoryElement from './docuCategoryElement.vue'
import docuObjectElement from './docuObjectElement.vue'
import docuFloorElement from './docuFloorElement.vue'
import cableLists from './cableLists.vue'

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
            docuCategoryElement,
            docuObjectElement,
            docuFloorElement,
            cableLists,
        },
        created() {
            this.$store.dispatch('getDocuObjectItems', [this.projectId])
            
            this.$store.dispatch('getDocuCategoryItems', this.projectId)
            
        },
        computed: {
            activeObject() {
                return this.$store.getters.ActiveObject
            }
        },
        methods: {
            
        }
}
</script>