<template>
   <div class="card border-0 col-12 col-lg-4 bg-transparent mt-1">
        <div class="card-body row p-0 align-items-start">
            
            <h5 class="h5 col-10 pl-0">Etagen</h5>
            <span   style="cursor:pointer"
                    class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end" 
                    @click="showNewFloorInput"
                    v-if="(activeObject != null) && (newFloorShow !== true)"></span>
            
            
            <div class="col-12 p-0">
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
            <div class="list-group list-group-action col-12 my-3 mb-5">
                <div v-for="docuFloor in docuFloors"
                    :key="docuFloor.id"
                    :docuFloor="docuFloor"
                    @click="setActiveFloor(docuFloor.id)"
                    data-toggle="list" 
                    class="list-group-item list-group-item-action"> {{docuFloor.Floor}} </div>   
            </div>
        </div>
    </div> 
</template>

<script>
export default {
    name: 'docuFloorElement',
    props: [
        'projectId'
    ],
    components: {

    },
    data() {
        return {
            newFloorShow: false,
            floor: '',
        }
    },
    created() {
        
    },
    computed: {
        docuFloors() {
                return this.$store.getters.DocuFloors;
            },
        activeObject() {
                return this.$store.getters.ActiveObject
            }
    },
    methods: {
            showNewFloorInput() {
                this.newFloorShow = !this.newFloorShow
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
            },
            setActiveFloor(floorId) {
                this.$store.dispatch('setActiveFloor', floorId)
                /* this.$store.dispatch('getDocuCategoryItems', [this.projectId, this.activeObject, this.activeFloor]) */
            },
    }, 
}
</script>