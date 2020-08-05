<template>
    <div>
        <h1 class="h1 my-4">Dokumentation</h1>

        <div class="card">
            <div class="card-body p-1 row align-items-start">
                <h4 class="h4 col-12 p-3">Überblick</h4>

                <div class="card border-0 col-12 col-md-6">
                    <div class="card-body p-0 row">
                        
                        <h5 class="h5 col-5">Gebäude</h5>
                        <span   style="cursor:pointer"
                                    class="fas fa-plus-circle fa-lg mt-2 col-7 d-flex justify-content-end" 
                                    @click="showNewObjectInput"
                                    v-if="!newObjectShow"></span>
                        

                        <div class="col-lg-7 col-12 p-0">
                            <div class="row">
                                <form class="col p-0">
                                <input type="text" class="form-control mr-2"  v-if="newObjectShow" v-model="object"/>
                                </form> 
                                <div class="col-auto pl-0 d-flex justify-content-end">
                                    <span   style="cursor:pointer"
                                            class="fas fa-check-circle fa-lg m-2"
                                            v-if="newObjectShow"
                                            @click="addNewDocuObject"></span>
                                    <span   style="cursor:pointer"
                                            class="fas fa-times-circle fa-lg mt-2 ml-2"
                                            v-if="newObjectShow"
                                            @click="showNewObjectInput"></span>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-action col-12 my-3 mb-4">
                            <button v-for="docuObject in docuObjects"
                                :key="docuObject.id"
                                :docuObject="docuObject"
                                @click="setActiveObject(docuObject.id)"
                                data-toggle="list" 
                                class="list-group-item list-group-item-action"
                                type="button"> {{docuObject.Object}} </button>
                            
                        </div>
                    </div>
                </div>

                <div class="card border-0 col-12 col-md-6">
                    <div class="card-body p-1 row align-items-start">
                        <h5 class="h5 col-5">Etagen</h5>
                        <span   style="cursor:pointer"
                                class="fas fa-plus-circle fa-lg mt-2 col-7 d-flex justify-content-end" 
                                @click="showNewFloorInput"
                                v-if="(activeObject != null) && (newFloorShow !== true)"></span>
                        
                        
                        <div class="col-lg-7 col-12 p-0">
                            <div class="row">   
                                <form class="col p-0">
                                <input type="text" class="form-control mr-2" v-if="newFloorShow" v-model="floor"/>
                                </form>
                                <div class="col-auto d-flex justify-content-end pl-0"> 
                                    <span   style="cursor:pointer"
                                            class="fas fa-check-circle fa-lg m-2"
                                            v-if="newFloorShow"
                                            @click="addNewDocuFloor"></span>
                                    <span   style="cursor:pointer"
                                            class="fas fa-times-circle fa-lg mt-2 ml-2"
                                            v-if="newFloorShow"
                                            @click="showNewFloorInput"></span>
                                </div>
                            </div>   
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
                activeObject: null,
                newFloorShow: false,
                object: '',
                floor: '',
                
            }
        },
        components: {
            docuCategoryElement,
            docuObjectElement
        },
        created() {
            this.$store.dispatch('getDocuObjectItems', [this.projectId])
        },
        computed: {
            docuObjects() {
                return this.$store.getters.DocuObjects;
            },
            docuFloors() {
                return this.$store.getters.DocuFloors;
            },
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
                Object: this.activeObject,
                ProjectId: this.projectId
            }
            this.$store.dispatch('addNewDocuObject', NewDocuObject)
            this.newObjectShow = !this.newObjectShow
            this.object= ''
            },
            setActiveObject(objectId) {
                this.activeObject = objectId
                this.$store.dispatch('getDocuFloorItems', [this.projectId, objectId])
            },
            
            addNewDocuFloor(){
            const NewDocuFloor = {
                Floor: this.floor,
                ProjectId: this.projectId,
                DocuObjectId: this.activeObject,
            }
            this.$store.dispatch('addNewDocuFloor', NewDocuFloor)
            this.newFloorShow = !this.newFloorShow
            this.floor= ''
            }
        }
        
    }
</script>

<style lang="scss">



</style>