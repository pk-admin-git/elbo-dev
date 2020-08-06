<template>
    <div class="card border-0 col-12 col-lg-4 bg-transparent mt-1">
        <div class="card-body p-0 row">
            
            <h5 class="h5 col-10 pl-0">Gebäude</h5>
            <span   style="cursor:pointer"
                        class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end" 
                        @click="showNewObjectInput"
                        v-if="!newObjectShow"></span>
            
            <div class="mt-2 col-2 d-flex justify-content-end mb-3" v-if="newObjectShow">
                <span   style="cursor:pointer"
                        class="fas fa-times-circle fa-lg mr-3"
                        @click="showNewObjectInput"></span>
                <span   style="cursor:pointer"
                        class="fas fa-check-circle fa-lg"
                        @click="addNewDocuObject"></span>
            </div>
            

            <div class="col-12 pl-0">
                <form class="col p-0">
                <input type="text" class="form-control"  v-if="newObjectShow" v-model="object"/>
                </form>
            </div>

            <div class="list-group list-group-action col-12 my-3 mb-5">
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
</template>


<script>
    export default {
        name: 'docuObjectElement',
        props: [
            'projectId'
        ],
        data() {
            return {
                newObjectShow: false,
                object: '',
            }
        },
        computed: {
            docuObjects() {
                return this.$store.getters.DocuObjects;
            },
            activeObject() {
                return this.$store.getters.ActiveObject
            }
        },
        methods: {
            showNewObjectInput() {
                this.newObjectShow = !this.newObjectShow
            },
            addNewDocuObject(){
            const NewDocuObject = {
                Object: this.object,
                ProjectId: this.projectId
            }
            this.$store.dispatch('addNewDocuObject', NewDocuObject)
            this.newObjectShow = !this.newObjectShow
            this.object= ''
            },
            setActiveObject(objectId) {
                let floorId = null
                this.$store.dispatch('setActiveObject', objectId)
                this.$store.dispatch('getDocuFloorItems', [this.projectId, this.activeObject])
                this.$store.dispatch('setActiveFloor', floorId)
            },
            
            
        
        }
    }
</script>