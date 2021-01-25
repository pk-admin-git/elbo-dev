<template>
<div>    
    <div class="text-h4 mt-5">Leistungsverzeichnis</div>
    <v-row class="mt-6">
        
        <v-col cols="12">
            
                <specificationFormElement :SpecItems="SpecItems" :projectId="projectId"/>

                <specificationElement :SpecItems="SpecItems"/>
        </v-col>
        
    </v-row>
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