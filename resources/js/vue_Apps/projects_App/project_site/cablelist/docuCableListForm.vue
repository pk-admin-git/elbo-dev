<template>
<div class="d-flex flex-column align-items-center">
    
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0 fas text-center" v-if="!CableListFormVisible" >
        <span class="fa-plus-circle fa-2x" style="cursor:pointer" @click="showCableListForm"></span>    
    </div>

    <div class="col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0 fas text-center" v-if="CableListFormVisible" >
        <span class="fa-times-circle fa-2x mr-3" style="cursor:pointer" @click="showCableListForm"></span>
        <span class="fa-check-circle fa-2x" style="cursor:pointer" @click="addNewCableListElement"></span>        
    </div>

    <div class="card col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0" v-if="CableListFormVisible">
        <div class="card-header row d-flex justify-content-center">
            
            <div class="col-12">
                <label for="inputRoom">Raum</label>
                <select id="inputRoom" class="custom-select" v-model.lazy="room">
                    <option v-for="docuRoom in docuRooms(cableList.FloorId)"
                            :key="docuRoom.id"
                            :value="docuObject.id">{{docuObject.Object}}</option>
                </select>
             </div>

            <h5 class="h5 col-8 p-0 text-center">Meldegruppennummer:</h5>
            <input type="text" class="form-control col-6" v-model="deviceNumber"/>

        </div>
    </div>
</div>
</template>

<script>


export default {

    name: 'docuCableListForm',
    props: [
        'cableListId'
    ],
    data() {
        return {
            CableListFormVisible: false,
            room: '',
            deviceNumber: '',

        }
    },
    methods: {
        showCableListForm() {
            this.CableListFormVisible = !this.CableListFormVisible
        },
        addNewCableListElement() {
            const NewCableListElement = {
                Device: this.device,
                DeviceNumber: this.deviceNumber,
                CableListId: this.cableListId,
                Position: this.$store.getters.CableListElementsLength + 1
            }
            this.$store.dispatch('addNewCableListElement', NewCableListElement)
            this.device= ''
            this.deviceNumber= ''
            
        },
        docuRooms(floorId){
            return this.$store.getters.DocuRoomsFiltered(floorId)
        }, 
    }

    
}
</script>