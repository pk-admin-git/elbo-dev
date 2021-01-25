<template>
    
<v-item v-slot:default="{ active, toggle }">
    <div>
        <v-card class="mx-auto px-2" max-width="380" color="#E1F5FE">
            <v-overlay :absolute="absolute" :value="alert">
                <v-alert :value="alert" transition="fade-transition"
                type="success">
                    Erfolgreich
                </v-alert>
            </v-overlay>
            <v-card-title>
                {{CableListElement.Device}} - {{CableListElement.DeviceNumber}}
                <v-card-actions>
                    <v-btn absolute right icon @click="toggle">
                        <v-icon>{{ active ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card-title>

            <v-expand-transition>
                <div v-show="active">
                    <v-divider></v-divider>
                    <v-expansion-panels >
                        <v-expansion-panel v-for="specElement in specElements"
                                            :key="specElement.id">
                            <v-expansion-panel-header>
                                <v-row no-gutters>
                                    <v-col cols="4">
                                        {{ specElement.PositionText }}
                                    </v-col>
                                    <v-col cols="8">
                                        {{ specElement.ShortText}}
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-list dense>
                                    <v-list-item-group>
                                        <v-list-item v-for="specRoom in specRooms(specElement)"
                                                        :key="specRoom.id">
                                        
                                        
                                        <template v-slot="{ active }">
                                            <v-hover v-slot="{ hover }">
                                            <v-list-item-content>
                                                <v-row>
                                                    <v-col cols="3" class="py-0 d-flex align-center">
                                                        {{specRoom.RoomText}}:
                                                    </v-col>
                                                    <v-col cols="3" class="py-0 d-flex align-center">
                                                        {{specRoom.Amount}} {{specElement.Unit}}
                                                    </v-col>
                                                    <v-col cols="3" class="py-0 d-flex align-center">
                                                        <v-chip :color="specRoom.MeasurmentId === CurrentMsr.id ? 'green' : 'grey'"
                                                                :text-color="specRoom.MeasurmentId === CurrentMsr.id ? 'white' : 'black'" x-small
                                                                class="d-flex justify-center">
                                                            {{specRoom.MeasurmentNumber}}
                                                        </v-chip>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0 d-flex align-center justify-end">
                                                        
                                                            <editCableListMeasurment
                                                            :cableListById="cableListById"
                                                            :CableListElement="CableListElement"
                                                            :specRoom="specRoom"
                                                            :SpecItems="SpecItems"
                                                            :CurrentMsr="CurrentMsr"/>
                                                        
                                                    </v-col>
                                                </v-row>
                                            </v-list-item-content>
                                            </v-hover>
                                        </template>
                                        </v-list-item>
                                    </v-list-item-group>
                                </v-list>  
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </v-expansion-panels>
                    
                    <v-row>
                        <v-col cols="12" class="d-flex justify-center">
                            <newCableListMeasurment
                            :cableListId="cableListId"
                            :projectId="projectId"
                            :cableListById="cableListById"
                            :user="user"
                            :CableListElement="CableListElement"
                            :SpecItems="SpecItems"
                            :CurrentMsr="CurrentMsr"
                            />
                        </v-col>
                    </v-row>
                </div>
            
            </v-expand-transition>
        </v-card>
        <div class="gradient-line-background"></div>
    </div>    
</v-item>
</template>

<script>
import newCableListMeasurment from './newCableListMeasurment' 
import editCableListMeasurment from './editCableListMeasurment'

export default {
    name: 'docuCableListelementV2',
    props: [
        'CableListElement', 
        'cableListId', 
        'projectId', 
        'cableListById', 
        'user',
        'measurments',
        'SpecItems',
        'CurrentMsr',
    ],
    components: {
        newCableListMeasurment,
        editCableListMeasurment
    },
    data() {
        return {
            show: false,
            crudMessage: false,
            alert: false,
            absolute: true,
            overlay: false,
        } 
    },
    mounted: function () {
        if(alert){
        this.hide_alert();
        }
    },
    computed: {
        
        specElements() {
            return this.$store.getters.SpecElementsByCableListElement(this.CableListElement.id)
        },
        docuElements() {
            return this.$store.getters.RoomElementsBySpecElement(this.CableListElement.id)
        } 
    },
    methods: {
        
        specRooms(specElement) {
            return this.$store.getters.RoomElementsBySpecElement(this.CableListElement.id)
                .filter(item => item.SpecificationId === specElement.id)
        },
        deleteItem() {
            this.alert = true
        },
        hide_alert: function () {
          window.setInterval(() => {
                this.alert = false;
            }, 4000)    
        },
    
    }
}
</script>

<style scoped>
.v-expansion-panel-content >>> .v-expansion-panel-content__wrap {  
        padding: 0;
    }
</style>

