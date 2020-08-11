<template>
   <div class="card border-0 col-12 col-lg-4 bg-transparent mt-1">
        <div class="card-body row p-0 align-items-start">
            
            <h5 class="h5 col-10 pl-0">Etagen</h5>
            <span   style="cursor:pointer"
                    class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end" 
                    @click="showNewFloorInput"
                    v-if="(activeObject != '') && (newFloorShow !== true)"></span>

            <div class="col-2 d-flex justify-content-end mb-3 mt-2" v-if="newFloorShow"> 
                <span   style="cursor:pointer"
                        class="fas fa-times-circle fa-lg mr-3"
                        @click="showNewFloorInput"></span>
                <span   style="cursor:pointer"
                        class="fas fa-check-circle fa-lg"
                        @click="addNewDocuFloor"></span>
            </div>
            
            
            <div class="col-12 pl-0">    
                <form class="col p-0">
                <input type="text" class="form-control mr-2" v-if="newFloorShow" v-model="floor"/>
                </form>    
            </div>

            <div class="list-group list-group-action col-12 my-3 mb-5" v-if="activeObject">
                <div v-for="docuFloor in docuFloors(activeObject)"
                    :key="docuFloor.id"
                    :docuFloor="docuFloor"
                    @click="setActiveFloor(docuFloor.id)"
                    style="cursor:pointer"
                    :class="docuFloor.id === activeFloor ? 'active' : ''" 
                    class="list-group-item list-group-item-action"> {{docuFloor.Floor}} </div>   
            </div>
        </div>
    </div> 
</template>

<script>
export default {
    name: 'overviewFloorElement',
    props: [
        'projectId'
    ],
    components: {

    },
    data() {
        return {
            newFloorShow: false,
            floor: '',
            activeFloorToggle: false,
        }
    },
    created() {
        
    },
    computed: {
        activeObject() {
            return this.$store.getters.ActiveObject
        },
        activeFloor() {
            return this.$store.getters.ActiveFloor
        }

    },
    methods: {
            showNewFloorInput() {
                this.newFloorShow = !this.newFloorShow
            },
            docuFloors(objectId){
                return this.$store.getters.DocuFloorsFiltered(objectId)
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
                
                this.activeFloor === floorId ? this.activeFloorToggle = true : this.activeFloorToggle = false
                if (this.activeFloorToggle === false) {
                    this.$store.dispatch('setActiveFloor', floorId)
                }
                else {
                    this.$store.dispatch('setActiveFloor', '')
                }
            },
    }, 
}
</script>