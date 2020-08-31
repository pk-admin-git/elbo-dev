<template>
    <div>
        <h1 class="h1 my-4">Dokumentation</h1>
        <button class="btn btn-success mb-4">
            <router-link :to="'/projectApp/project/'+ projectId +'/projectDocu/DocuOverview'"
                    style="text-decoration:none; color:inherit;">Zurück zur Übersicht</router-link>
        </button>
        <h3 class="h3">Kabelzugliste</h3>

        <div class="d-flex flex-column align-items-center">    
            
            <div class="card col-12 col-sm-10 col-md-8 col-lg-6 text-white bg-secondary m-3 px-0">
                <div class="card-header"><h5 class="h5 mb-0">Start</h5></div>
                <div class="card-body"></div>
            </div>
        </div>

            <cableListElement v-for="CableListElement in CableListElements"
                                :key="CableListElement.id"
                                :CableListElement="CableListElement"/>

            

            <cableListForm :cableListId="cableListId"/>


        


    </div>
</template>

<script>
import cableListElement from './docuCableListElement.vue'
import cableListForm from './docuCableListForm.vue'

export default {
    name: 'docuCableList',
    props: [
        'projectId', 'cableListId'
    ],
    components: {
        cableListElement,
        cableListForm,
    },
    created() {
            this.$store.dispatch('getCableListElements', [this.projectId, this.cableListId])
    },
    computed: {
        CableListElements() {
            return this.$store.getters.CableListElements
        }
    },
    
    
}
</script>