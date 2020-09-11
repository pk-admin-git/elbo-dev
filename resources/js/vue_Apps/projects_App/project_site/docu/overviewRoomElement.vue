<template>
    <div class="card border-0 col-12 bg-transparent mt-1">
        <div class="card-body row p-0 align-items-start">
            
            <h5 class="h5 col-10 pl-0">Räume</h5>
            <span   style="cursor:pointer"
                    class="fas fa-plus-circle fa-lg mt-2 col-2 d-flex justify-content-end" 
                    @click="showNewRoomInput"
                    v-if="(activeFloor != '') && (newRoomShow !== true)"></span>

            <div class="col-2 d-flex justify-content-end mb-3 mt-2" v-if="newRoomShow"> 
                <span   style="cursor:pointer"
                        class="fas fa-times-circle fa-lg mr-3"
                        @click="showNewRoomInput"></span>
                <span   style="cursor:pointer"
                        class="fas fa-check-circle fa-lg"
                        @click="addNewDocuRoom"></span>
            </div>
            
            
            <div class="col-12 pl-0">    
                <form class="col p-0">
                <input type="text" class="form-control mr-2" v-if="newRoomShow" v-model="room"/>
                </form>    
            </div>

            
            <div class="list-group col-12 my-3 mb-5" v-if="activeFloor">
                <div class="row"> 
                    <div v-for="docuRoom in docuRooms(activeFloor)"
                        :key="docuRoom.id"
                        :docuRoom="docuRoom"
                        class="list-group-item col-lg-2 col-md-3 col-4"> {{docuRoom.Room}} 
                    </div>
                </div>   
            </div>
        </div>
    </div> 
</template>

<script>
export default {
    name: 'overviewRoomElement',
    props: [
        'projectId'
    ],
    data() {
        return {
            newRoomShow: false,
            room: '',
            activeRoomToggle: false,
        }
    },
    computed: {
        activeFloor() {
            return this.$store.getters.ActiveFloor
        }
    },
    methods: {
        showNewRoomInput() {
            this.newRoomShow = !this.newRoomShow
        },
        docuRooms(floorId){
            return this.$store.getters.DocuRoomsFiltered(floorId)
        },
        addNewDocuRoom(){
        const NewDocuRoom = {
            Room: this.room,
            ProjectId: this.projectId,
            DocuFloorId: this.activeFloor,
        }
        this.$store.dispatch('addNewDocuRoom', NewDocuRoom)
        this.room= ''
        },
    },
    
}
</script>