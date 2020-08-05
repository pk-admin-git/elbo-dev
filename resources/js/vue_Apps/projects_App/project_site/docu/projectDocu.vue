<template>
    <div>
        <h1 class="h1 my-4 mb-5">Dokumentation</h1>

        <docuOverview :projectId="projectId"/>
    
        
        
    </div>
</template>


<script>

import docuOverview from './docuOverview.vue'


    export default {
        name: 'projectDocu',
        props: [
            'projectId'
        ],
        components: {
            docuOverview,
        } 
                
        
    }
</script>

<style lang="scss">



</style>