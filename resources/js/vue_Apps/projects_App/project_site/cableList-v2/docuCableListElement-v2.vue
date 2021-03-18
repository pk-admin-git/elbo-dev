<template>
    
<v-item v-slot:default="{ active, toggle }">
    <div>
        <v-card class="mx-auto px-2" max-width="380" color="#E1F5FE">
            <v-card-title class="d-flex justify-space-between">
                {{CableListElement.Device}} - {{CableListElement.DeviceNumber}}
                <v-card-actions>
                    <v-btn icon x-small v-if="active"><v-icon small class="mr-2">
                        mdi-pencil
                    </v-icon></v-btn>
                    <v-btn icon x-small v-if="active"><v-icon  @click="deleteDialog=true" small>
                        mdi-delete
                    </v-icon></v-btn>
                    <v-btn icon @click="toggle">
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
                                            <v-list-item-content>
                                                <v-row>
                                                    <v-col cols="4" class="py-0 d-flex align-center">
                                                        {{specRoom.RoomText}}:
                                                    </v-col>
                                                    <v-col cols="3" class="py-0 d-flex align-center">
                                                        {{specRoom.Amount}} {{specElement.Unit}}
                                                    </v-col>
                                                    <v-col cols="2" class="py-0 d-flex align-center">
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
        <div class="gradient-line-background mx-auto px-2" style="max-width:380px;"></div>
    
    <!-- Dialog Löschen -->
    <v-dialog
        v-model="deleteDialog"
        persistent
        max-width="350">
            <v-sheet
                dark
                class="px-7 pt-7 pb-4 text-center d-inline-block"
                color="blue-grey darken-3">
                <div class="grey--text text--lighten-1 text-body-2 mb-4">
                    Soll das Element wirklich gelöscht werden?
                </div>

                <v-btn
                    class="ma-1"
                    color="grey"
                    text
                    plain
                    @click="deleteDialog=false">
                    Abbrechen
                </v-btn>

                <v-btn
                    class="ma-1"
                    color="error"
                    text
                    plain
                    @click="deleteCableListElement(CableListElement.id)">
                    Löschen
                </v-btn>
            </v-sheet>
    </v-dialog>

    <!-- Dialog Error -->
    <v-dialog
        v-model="errorDialog"
        persistent
        max-width="350">
            <v-sheet
                dark
                class="px-7 pt-7 pb-4 text-center d-inline-block"
                color="blue-grey darken-3">
                <div class="grey--text text--lighten-1 text-body-2 mb-4">
                    Das Element kann nicht gelöscht werden, da sich noch Dokumentationen im Element befinden.
                </div>

                <v-btn
                    class="ma-1"
                    color="grey"
                    text
                    plain
                    @click="errorDialog=false">
                    Ok
                </v-btn>
            </v-sheet>
    </v-dialog>
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
            overlay: false,
            deleteDialog: false,
            errorDialog: false,
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
        deleteCableListElement(id) {
            const specRooms = this.$store.getters.RoomElementsBySpecElement(id)
            if(specRooms.length < 1) {
                this.$store.dispatch('deleteCableListElement', id)
                this.deleteDialog = false
            }
            else {
                this.deleteDialog = false
                this.errorDialog = true
            }
        }
    
    }
}
</script>

<style scoped>
.v-expansion-panel-content >>> .v-expansion-panel-content__wrap {  
        padding: 0;
    }
</style>

