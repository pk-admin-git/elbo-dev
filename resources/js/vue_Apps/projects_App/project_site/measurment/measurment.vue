<template>
<div>
    <h1 class="h1 mt-4 mb-5">Aufmaß</h1>

    <button type="button" class="btn btn-primary mb-3">Neues Aufmaß</button>
    
    <div class="card col-12 col-sm-6 offset-sm-3 ">
        <div class="card-body row">
            
            <div class="col-12 row mb-2">
                <h5 class="h5 d-inline col-10">Aufmaß 1</h5>
                <div class="col-2 custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1"></label>
                </div>
            </div>

            <div class="col-12 row mb-2">
                <h5 class="h5 d-inline col-10">Aufmaß 2</h5>
                <div class="col-2 custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch2">
                    <label class="custom-control-label" for="customSwitch2"></label>
                </div>
            </div>

            <div class="col-12 row mb-2">
                <h5 class="h5 d-inline col-10">Aufmaß 3</h5>
                <div class="col-2 custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch3">
                    <label class="custom-control-label" for="customSwitch3"></label>
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
    methods: {
        addNewMeasurment() {
            const NewMeasurment = {
                ProjectID: this.projectID,
                Number: this.$store.getters.MeasurmentsLenght + 1,
                Closed: 0,
                Current: 0
            }
            this.$store.dispatch('addNewMeasurment', NewMeasurment)
        },
    }
    
}
</script>