<template>
<div class="d-flex flex-column align-items-center">
    <div class="card col-11 col-sm-10 col-md-8 col-lg-6 bg-light m-3 p-0">
        <div class="card-header"><h5 class="h5 mb-0">{{CableListElement.Device}}: {{CableListElement.DeviceNumber}}</h5></div>
        <div class="card-body">
            <cableListElementMeasure v-for="(cableListElementMeasure, index) in 3"
                                    :key="index"/>

            <div class="d-flex flex-column align-items-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0 fas text-center" v-if="!MeasureFormVisible" >
                    <span class="fa-plus-circle fa-lg" style="cursor:pointer" @click="showMeasureForm"></span>    
                </div>

                <div class="col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0 fas text-center" v-if="MeasureFormVisible" >
                    <span class="fa-times-circle fa-lg mr-3" style="cursor:pointer" @click="showMeasureForm"></span>
                    <span class="fa-check-circle fa-lg" style="cursor:pointer" @click="showMeasureForm"></span>        
                </div>

                <div class="card col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 py-0" v-if="MeasureFormVisible">
                    <div class="card-header row d-flex justify-content-center">
                        
                        <div class="col-12">
                            <label for="inputRoom">Position</label>
                            <select id="inputRoom" class="custom-select" v-model.lazy="room">
                                <option v-for="docuRoom in docuRooms"
                                        :key="docuRoom.id"
                                        :value="docuRoom.id">{{docuRoom.Room}}</option>
                            </select>
                        </div>
                        
                        <div class="col-12">
                            <label for="inputRoom">Raum</label>
                            <select id="inputRoom" class="custom-select" v-model.lazy="room">
                                <option v-for="docuRoom in docuRooms"
                                        :key="docuRoom.id"
                                        :value="docuRoom.id">{{docuRoom.Room}}</option>
                            </select>
                        </div>

                        <div class="col-12">
                        <h6 class="h6">Menge:fg</h6>
                        <input type="text" class="form-control col-12" v-model="deviceNumber"/>
                        </div>
                        

                        

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</template>

<script>
import cableListElementMeasure from './cableListElementMeasure.vue'

export default {
    name: 'cableListElement',
    props: [
        'CableListElement',
        'cableListId'
    ],
    components: { 
        cableListElementMeasure
    },
    data() {
        return {
            MeasureFormVisible: false,
            room: '',
            deviceNumber: '',

        }
    },
    computed: {
        getActiveCableList() {
            /* return this.$store.getters.ActiveCableList */
        },
        cableList() {
            return (this.$store.getters.CableListById(Number(this.cableListId)))
        },
        docuRooms(){
            return this.$store.getters.DocuRoomsFiltered(this.cableList.FloorId)
        },
        currentMeasurment() {
            return this.$store.getters.CurrentMeasurment
        }
    },
    methods: {
        showMeasureForm() {
            this.MeasureFormVisible = !this.MeasureFormVisible
        },
        
    }

}
</script>