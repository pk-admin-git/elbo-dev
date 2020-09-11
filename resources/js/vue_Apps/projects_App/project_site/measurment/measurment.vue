<template>
<div>
    <h1 class="h1 mt-4 mb-5">Aufmaß</h1>

    <button type="button" class="btn btn-primary mb-3" @click="addNewMeasurment">Neues Aufmaß</button>
    
    <div class="card col-12 col-sm-6 offset-sm-3 ">
        <div class="card-body row">
            
            <div v-for="measurment in measurments" 
                :key="measurment.id"
                :measurment="measurment"
                class="col-12 p-0 row my-2">
                <h5 class="h5 d-inline col-8 m-0">Aufmaß {{measurment.Number}}</h5>
                <div class="col-4 custom-control custom-switch d-flex justify-content-end ">
                    <input type="checkbox" 
                        class="custom-control-input" 
                        id="customSwitch1"
                        @click="setCurrentMsr(measurments.id)">
                    <label class="custom-control-label" for="customSwitch1"></label>
                </div>
            </div>

        </div>
    </div>

</div>
</template>

<script>
export default {
    name: 'measurment',
    props: [
        'projectId'
    ],
    data() {
        return {

        }
    },
    created() {
            this.$store.dispatch('getMeasurments', this.projectId)
    },
    computed: {
        measurments(){
            return this.$store.getters.Measurments
        }
    },       
    methods: {
        addNewMeasurment() {
            const NewMeasurment = {
                ProjectId: this.projectId,
                Number: this.$store.getters.MeasurmentsLength + 1,
                Closed: 0,
                Current: 0
            }
            this.$store.dispatch('addNewMeasurment', NewMeasurment)
        },
        setCurrentMsr(measurmentId) {
            /* oldCurrentMsr = this.$store.getters.CurrentMeasurment */
            const NewValue = {
                Current: 1
            }
            this.$store.dispatch('setCurrentMeasurment', measurmentId, NewValue)
        }
    }
    
}
</script>