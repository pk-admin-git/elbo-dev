<template>
    <div>
        <h1 class="h1 my-4">Leistungsverzeichnis</h1>
       

        <specificationElement v-for="(element, index) in 28" 
                                :key="index"
                                :element="element"
                                :index="index"/>

    </div>
</template>


<script>
import specificationElement from './specificationElement.vue';

    export default {
        name: 'projectSpecification',
        components: {
            specificationElement
        }
    }
</script>