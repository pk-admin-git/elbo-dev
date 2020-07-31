<template>
    <div>
        <h1 class="h1 my-4">Dokumentation</h1>

        <div class="accordion" id="accordionCategory">
            <docuCategoryElement v-for="(docuCategory, index) in 3"
                                        :key="index"
                                        :index="index"
                                        :docuCategory="docuCategory"/>
        </div>
    </div>
</template>


<script>

import docuCategoryElement from './docuCategoryElement.vue'

    export default {
        name: 'projectDocu',
        props: [
            'id',
        ],
        data() {
            return {
                
                
            }
        },
        components: {
            docuCategoryElement,
        },
        created() {
            this.$store.dispatch('getDocuObjectItems', [this.id])
        },
        computed: {
            docuObjects() {
                return this.$store.getters.DocuObjects;
            }
        },
        
    }
</script>