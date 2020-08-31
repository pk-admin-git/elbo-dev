<template>
<div class="d-flex flex-column align-items-center">
    <div class="card col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0">
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

                <div class="card col-12 col-sm-10 col-md-8 col-lg-6 bg-light m-3 px-0" v-if="MeasureFormVisible">
                    <div class="card-header row d-flex justify-content-center">
                        
                        <h5 class="h5 col-8 p-0 text-center">Raum: </h5>
                        <input type="text" class="form-control col-6 mb-2" v-model="device"/>

                        <h5 class="h5 col-8 p-0 text-center">Meldegruppennummer:</h5>
                        <input type="text" class="form-control col-6" v-model="deviceNumber"/>

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
        'CableListElement'
    ],
    components: { 
        cableListElementMeasure
    },
    data() {
        return {
            MeasureFormVisible: false,
            device: '',
            deviceNumber: '',

        }
    },
    methods: {
        showMeasureForm() {
            this.MeasureFormVisible = !this.MeasureFormVisible
        }
    }

}
</script>