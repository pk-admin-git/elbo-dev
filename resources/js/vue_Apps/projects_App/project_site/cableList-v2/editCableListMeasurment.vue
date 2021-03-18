
<template>
<div class="d-flex align-center" v-if="specRoom.MeasurmentId === CurrentMsr.id ? true : false">
    <v-btn icon x-small><v-icon  @click.stop="[dialogEditToggel(true), setCurrentData()]" small class="mr-2">
        mdi-pencil
    </v-icon></v-btn>
    <v-btn icon x-small><v-icon  @click.stop="deleteDialog=true" small>
        mdi-delete
    </v-icon></v-btn>
    <v-dialog v-model="dialogEdit" persistent max-width="600px">
        <v-card>
            <v-card-title class="d-flex justify-space-between">
            <span class="headline">Position aufmessen</span>
            <v-chip color="green" text-color="white">
                Aufmaß
                <v-avatar v-if="CurrentMsr"
                    right
                    class="green darken-4">
                    {{CurrentMsr.Number}}
                </v-avatar>
            </v-chip>
            </v-card-title>
            <v-card-text>
                <v-container>
                    <v-form v-model="valid">
                    <v-row>
                        <v-col cols="5">
                            <v-select
                                :items="docuObjects"
                                v-model="object"
                                :item-text="'Object'"
                                return-object
                                label="Gebäude"
                                :disabled="ObjectFloorLocked"
                                required
                                :rules="[v => !!v || 'Auswahl erforderlich']">
                            </v-select>
                        </v-col>
                        <v-col cols="5">
                            <v-select v-if="cableListById"
                                :items="docuFloors"
                                v-model="floor"
                                :item-text="'Floor'"
                                return-object
                                label="Etage"
                                :disabled="ObjectFloorLocked"
                                required
                                :rules="[v => !!v || 'Auswahl erforderlich']">
                            </v-select>
                        </v-col>
                        <v-col cols="2" class="d-flex justify-center align-center">
                            <v-btn icon @click="unlockObjectFloor" v-if="ObjectFloorLocked">
                                <v-icon >mdi-lock</v-icon>
                            </v-btn>
                            <v-btn icon @click="unlockObjectFloor" v-if="!ObjectFloorLocked">
                                <v-icon>mdi-lock-open</v-icon>
                            </v-btn>
                        </v-col>
                        <v-col cols="12">
                            <v-autocomplete
                            :items="SpecItems"
                            v-model="specItem"
                            :item-text="'ShortText'"
                            return-object
                            label="Position"
                            required
                            :rules="[v => !!v || 'Auswahl erforderlich']">
                            <template v-slot:item="data">
                                <v-row>
                                    <v-col cols="4">
                                        {{data.item.PositionText}}
                                    </v-col>
                                    <v-col cols="8">
                                        {{data.item.ShortText}}
                                    </v-col>
                                </v-row>
                            </template>
                            </v-autocomplete>
                        </v-col>
                        <v-col cols=4>
                            <v-select v-if="cableListById"
                                :items="docuRooms"
                                v-model="room"
                                :item-text="'Room'"
                                return-object
                                label="Raum"
                                required
                                :rules="[v => !!v || 'Auswahl erforderlich']">
                            </v-select>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field
                                v-model="convertQuantity"
                                label="Menge"
                                required
                                :rules="[v => !!v || 'Eingabe erforderlich']">
                            </v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-checkbox
                                v-model="finished"
                                label="Finale Installation">
                            </v-checkbox>
                        </v-col>
                    </v-row>
                    </v-form>
                </v-container>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="dialogEditToggel(false)">Close</v-btn>
                <v-btn color="blue darken-1" text @click="addNewDocumentation">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>

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
                    @click="deleteItem(specRoom.id)">
                    Löschen
                </v-btn>
            </v-sheet>
    </v-dialog>
</div>
</template>

<script>
export default {
    name: 'editCableListMeasurment',
    props: [
        'cableListById',
        'CableListElement',
        'SpecItems',
        'CurrentMsr',
        'specRoom'
    ],
    data: () => ({
        valid: false,
        deleteDialog: false,
        specItem: '',
        object: '',
        floor: '',
        room: '',
        quantity: null,
        ObjectFloorLocked: true,
        finished: true,
        dialogEdit: false,

    }),
    created() {
    
    },
    computed: {
        convertQuantity: {
            get: function() {
                return this.quantity
            },
            set: function(newValue) {
                if (newValue != '') {
                this.quantity = (Math.round(parseFloat(newValue.replace(/,/, "." ))*100)) /100
                }
            }
        },
        docuObjects() {
            return this.$store.getters.DocuObjects
        },
        docuFloors(){
            return this.$store.getters.DocuFloorsFiltered(this.object.id)
        },
        docuRooms(){
            return this.$store.getters.DocuRoomsFiltered(this.floor.id)
        },

    },
    methods: {
        unlockObjectFloor() {
            this.ObjectFloorLocked = !this.ObjectFloorLocked
        },
        setCurrentData() {
            this.object = this.$store.getters.ObjectById(this.specRoom.ObjectId)
            this.floor = this.$store.getters.FloorById(this.specRoom.FloorId)
            this.room = this.$store.getters.RoomById(this.specRoom.RoomId)
            this.specItem = this.$store.getters.SpecById(this.specRoom.SpecificationId)
            this.finished = this.specRoom.Finished
            this.quantity = this.specRoom.Amount
        },
        addNewDocumentation() {
            const newDocu= {
                ProjectId : this.specRoom.ProjectId,
                EmployeeId : this.specRoom.EmployeeId,
                MeasurmentId : this.specRoom.MeasurmentId,
                MeasurmentNumber : this.specRoom.MeasurmentNumber,
                SpecificationId : this.specItem.id,
                CategoryId : this.specRoom.CategoryId,
                ObjectId : this.object.id,
                ObjectText : this.object.Object,
                FloorId : this.floor.id,
                FloorText : this.floor.Floor,
                RoomId : this.room.id,
                RoomText : this.room.Room,
                CableListId : this.specRoom.CableListId,
                CableListElementId : this.specRoom.CableListElementId,
                Amount : this.quantity,
                Finished : this.finished
                }
            if(this.valid) {
                this.$store.dispatch('updateDocu', [newDocu, this.specRoom.id])
                this.dialogEdit = false
            }
        },
        dialogEditToggel(value) {
            this.dialogEdit = value
        },
        deleteItem(id) {
            this.$store.dispatch('deleteDocu', id)
            this.deleteDialog = false
        }
    }   
}
</script>