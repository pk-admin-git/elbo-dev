<template>
    <div>
        <h1 class="h1 my-4">Dokumentation</h1>

        <div class="card">
            <div class="card-body p-1 row">
                <h4 class="h4 col-12 p-3">Überblick</h4>

                <div class="card border-0 col-12 col-md-6">
                    <div class="card-body p-0 row justify-content-between">
                        <h5 class="h5 col-4">Objekte</h5>
                        <div class="col-8 d-flex justify-content-end">
                            <form class="form-inline">
                            <input type="text" class="form-control"  v-if="newObjectShow" v-model="object"/>
                            </form> 
                            <span   style="cursor:pointer"
                                    class="fas fa-check-circle fa-lg m-2"
                                    v-if="newObjectShow"
                                    @click="addNewDocuObject"></span>
                            <span   style="cursor:pointer"
                                    class="fas fa-plus-circle fa-lg" 
                                    @click="showNewObjectInput"
                                    v-if="!newObjectShow"></span>
                            
                        </div>
                        <ul class="list-group col-12 my-3">
                            <li v-for="docuObject in docuObjects"
                                :key="docuObject.id"
                                :docuObject="docuObject" 
                                class="list-group-item"> {{docuObject.Object}} </li>
                            
                        </ul>
                    </div>
                </div>

                <div class="card border-0 col-12 col-md-6">
                    <div class="card-body p-0 row justify-content-between">
                        <h5 class="h5 col-4">Etagen</h5>
                        <div class="col-8 d-flex justify-content-end align-items-start">
                            <form class="form-inline">
                            <input type="text" class="form-control" v-if="newFloorShow" v-model="floor"/>
                            </form> 
                            <span   style="cursor:pointer"
                                    class="fas fa-check-circle fa-lg m-2"
                                    v-if="newFloorShow"
                                    @click="addNewDocuFloor"></span>
                            <span   style="cursor:pointer"
                                    class="fas fa-plus-circle fa-lg" 
                                    @click="showNewFloorInput"
                                    v-if="!newFloorShow"></span>
                        </div>
                        <ul class="list-group col-12 my-3">
                            <li v-for="docuFloor in docuFloors"
                                :key="docuFloor.id"
                                :docuFloor="docuFloor" 
                                class="list-group-item"> {{docuFloor.Floor}} </li>
                            
                        </ul>
                    </div>
                </div>




            </div>
        </div>
    
        
        
    </div>
</template>


<script>

import docuCategoryElement from './docuCategoryElement.vue'
import docuObjectElement from './docuObjectElement.vue'

    export default {
        name: 'projectDocu',
        props: [
            'projectId',
            
        ],
        data() {
            return {
                newObjectShow: false,
                newFloorShow: false,
                object: '',
                objectId: '1',
                floor: '',
                
            }
        },
        components: {
            docuCategoryElement,
            docuObjectElement
        },
        created() {
            this.$store.dispatch('getDocuObjectItems', [this.projectId])
            this.$store.dispatch('getDocuFloorItems', [this.projectId, this.objectId])
        },
        computed: {
            docuObjects() {
                return this.$store.getters.DocuObjects;
            },
            docuFloors() {
                return this.$store.getters.DocuFloors;
            }
        },
        methods: {
            showNewObjectInput() {
                this.newObjectShow = !this.newObjectShow
            },
            showNewFloorInput() {
                this.newFloorShow = !this.newFloorShow
            },
            addNewDocuObject(){
            const NewDocuObject = {
                Object: this.object,
                ProjectId: this.projectId
            }
            this.$store.dispatch('addNewDocuObject', NewDocuObject)
            this.newObjectShow = !this.newObjectShow
            },
            addNewDocuFloor(){
            const NewDocuFloor = {
                Floor: this.floor,
                ProjectId: this.projectId,
                DocuObjectId: this.objectId,
            }
            this.$store.dispatch('addNewDocuFloor', NewDocuFloor)
            this.newFloorShow = !this.newFloorShow
            }
        }
        
    }
</script>