<template>
    <div>
        <h1 class="h1 my-4">Leistungsverzeichnis</h1>
       

        <specificationFormElement/>

        <specificationElement v-for="SpecItem in SpecItems" 
                                :key="SpecItem.id"
                                :SpecItem="SpecItem"/>

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