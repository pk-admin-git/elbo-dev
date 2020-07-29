<template>
    <div>
        <h1 class="h1 my-4">Dokumentation</h1>

        <div class="row col-12 my-3">
            <button type="button" class="btn btn-primary" @click="collapseNewObjectForm">Objekt anlegen</button>
        </div>

        <form class="form-inline" v-if="newObjectFormVisible">
            <input type="text" class="form-control mr-2" id="ObjectName" placeholder="Name" v-model="name">
            <button type="button" class="btn btn-success mr-2 mt-2 mt-sm-0" @click="addNewDocuObject">Anlegen</button>
            <button type="button" class="btn btn-secondary mr-2 mt-2 mt-sm-0">Schließen</button>
        </form>

        <div class="accordion" id="accordionExample">
            
        <docuCategoryElement v-for="docuObject in docuObjects" 
                            :key="docuObject.id"
                            :docuObject="docuObject"/>
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
                newObjectFormVisible: false,
                object: ''
            }
        },
        components: {
            docuCategoryElement,
        },
        created() {
            this.$store.dispatch('getProjectItems');
            this.$store.dispatch('getDocuObjectItems');
        },
        computed: {
            docuObjects() {
                return this.$store.getters.DocuObjects;
            }
        },
        methods: {
            collapseNewObjectForm: function() {
                this.newObjectFormVisible = !this.newObjectFormVisible;
            },
            addNewDocuObject(){
            const NewDocuObject = {
                Object: this.object,
                ProjectId: this.id
            }
            this.$store.dispatch('addNewDocuObject', NewDocuObject)
            this.$store.dispatch('getProjectItems');
        } 
        }
    }
</script>