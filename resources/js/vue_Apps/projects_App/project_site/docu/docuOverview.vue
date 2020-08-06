<template>
    <div class="card border-0 bg-transparent">
        <div class="card-body row align-items-start p-0">
            <h3 class="h3 col-12 mb-4">Überblick</h3>

            <!-- Gebäude -->

            <docuObjectElement :projectId="projectId"/>

            <!-- Etagen -->

            <docuFloorElement :projectId="projectId"/>

            <!-- Kategorien -->

            <docuCategoryElement/>



        </div>
    </div>
</template>

<script>
import docuCategoryElement from './docuCategoryElement.vue'
import docuObjectElement from './docuObjectElement.vue'
import docuFloorElement from './docuFloorElement.vue'

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
        },
        created() {
            this.$store.dispatch('getDocuObjectItems', [this.projectId])
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