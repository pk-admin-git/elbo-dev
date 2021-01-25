<template>
<div>
    <div class="text-h4 mt-5">Aufmaß</div>

    <v-btn color="primary" elevation="2" class="mt-8" @click="addNewMeasurment">
        Neues Aufmaß
    </v-btn>
    <v-row class="mt-6">
        <v-spacer></v-spacer>
        <v-col cols="12"
                sm="10"
                md="8">
            <v-card>
                <v-list>
                    <v-list-item-group v-model="msrModel" mandatory color="indigo">
                        <v-list-item v-for="measurment in measurments" 
                            :key="measurment.id"
                            :measurment="measurment">
                            
                                <v-list-item-content>
                                    <v-list-item-title>Aufmaß {{measurment.Number}}</v-list-item-title>
                                </v-list-item-content>

                                <v-list-item-action>
                                    <v-switch
                                        :input-value="measurment.Current"
                                        @mousedown="setCurrentMsr(measurment.id)">
                                    </v-switch>
                                </v-list-item-action>
                        </v-list-item>
                    </v-list-item-group>
                </v-list>
                <v-overlay :value="alertAtLeastOneMsr">
                    <v-alert
                        v-model="alertAtLeastOneMsr"
                        close-text="Close Alert"
                        type="warning"
                        dismissible
                        transition="scale-transition"
                        dense>Ein Aufmaß muss immer aktiv bleiben
                    </v-alert>
                </v-overlay>
            </v-card>
        </v-col>
        <v-spacer></v-spacer>
    </v-row>
    
</div>
</template>

<script>

export default {
    name: 'measurment',
    components: {
        
    },
    props: [
        'projectId'
    ],
    data() {
        return {
            msrModel: '',
            alertAtLeastOneMsr: false,
            currentMsrModel: '',
        }
    },
    created() {
            this.$store.dispatch('getMeasurments', this.projectId)
    },
    computed: {
        measurments(){
            return this.$store.getters.Measurments
        },
        currentMsr(){
            // eslint-disable-next-line vue/no-side-effects-in-computed-properties
            this.currentMsrModel = this.$store.getters.CurrentMeasurment.id
            return this.$store.getters.CurrentMeasurment
        }
    },       
    methods: {
        
        addNewMeasurment() {

            if (this.measurments.length < 1) {
                const NewMeasurment = {
                ProjectId: this.projectId,
                Number: this.$store.getters.MeasurmentsLength + 1,
                Closed: 0,
                Current: 1
                }
                this.$store.dispatch('addNewMeasurment', NewMeasurment)
            }
            else {
                const NewMeasurment = {
                ProjectId: this.projectId,
                Number: this.$store.getters.MeasurmentsLength + 1,
                Closed: 0,
                Current: 0
                }
                this.$store.dispatch('addNewMeasurment', NewMeasurment) 
            }
            
        },
        setCurrentMsr(measurmentId) {
            
            if (measurmentId === this.currentMsr.id){
                this.alertAtLeastOneMsr=true
            }
            else {   
                const oldCurrent = this.currentMsr.id
                const oldValue = {
                    Current: 0
                } 
                const newCurrent = measurmentId
                const newValue = {
                Current: 1
                }
                
                this.$store.dispatch('setCurrentMeasurment', [oldCurrent, oldValue, newCurrent, newValue])
            }
        }
    }
    
}
</script>