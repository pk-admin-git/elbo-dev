<template>
    <div class="d-flex flex-column align-items-center">
        
        <h1 class="h1 my-4 align-self-start">Leistungsverzeichnis</h1>

        <div class="col-lg-9 col-md-11 col-12">
            
            <specificationFormElement :SpecItems="SpecItems" :projectId="projectId"/>

            <specificationElement v-for="SpecItem in SpecItems" 
                                    :key="SpecItem.id"
                                    :SpecItem="SpecItem"/>
        </div>
    </div>
</template>


<script>
import specificationElement from './specificationElement.vue';
import specificationFormElement from './specificationFormElement.vue'

export default {
    name: 'projectSpecification',
    props: [
        'projectId'
    ],
    components: {
        specificationElement,
        specificationFormElement
    },
    created() {
        this.$store.dispatch('getSpecItems', this.projectId);
    },
    computed: {
        SpecItems() {
            return this.$store.getters.SpecItems
        },
    },
}
</script>