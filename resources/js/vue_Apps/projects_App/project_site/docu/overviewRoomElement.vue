<template>
<v-col cols="12">
    <!-- Räume -->
    <v-card tile elevation="0" class="px-2">
        <v-row>
            <v-col cols="8">
                <v-card-title class="py-0">Räume</v-card-title>
            </v-col>
            <v-col cols="4" class="d-flex align-end flex-column"
                    v-if="(activeFloor != '') && (newRoomShow !== true)">
                <v-btn icon 
                        @click="showNewRoomInput">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </v-col>
            <v-col cols="4" class="d-flex justify-end"
                v-if="newRoomShow">
                <v-btn icon
                        @click="addNewDocuRoom">
                    <v-icon>mdi-check</v-icon>
                </v-btn>
                <v-btn icon 
                        @click="showNewRoomInput">
                    <v-icon>mdi-window-close</v-icon>
                </v-btn>
            </v-col>

            <!-- Neuen Raum anlegen -->
            <v-col cols="12" v-if="newRoomShow">
            
            <v-form class="px-3">
                <v-text-field
                    v-model="room"
                    label="Name des Raumes"
                    required>
                </v-text-field>
                
            </v-form>
            </v-col>
            
            <!-- Ausgabe Räume -->
            
            <v-col cols="12">
                <v-item-group color="primary">
                    <v-row no-gutters>
                    <v-col cols="2" v-for="docuRoom in docuRooms(activeFloor)"
                                    :key="docuRoom.id"
                                    :docuRoom="docuRoom">
                        <v-item>
                            <v-sheet outlined height="40"
                                    class="d-flex align-center justify-center">
                                {{docuRoom.Room}}
                            </v-sheet>
                        </v-item>
                    </v-col>
                    </v-row>
                </v-item-group> 
            </v-col>  
        </v-row>
    </v-card>
</v-col>
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